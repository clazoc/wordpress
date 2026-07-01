<?php
/**
 * Endpoint per la raccolta email newsletter coming soon.
 * Riceve POST JSON {"email":"..."} e appende al file subscribers.csv
 * nella stessa cartella. Da usare solo finché non c'è un ESP integrato.
 */

header( 'Content-Type: application/json' );
header( 'X-Content-Type-Options: nosniff' );

if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) {
	http_response_code( 405 );
	exit( json_encode( [ 'error' => 'Method not allowed' ] ) );
}

$body  = file_get_contents( 'php://input' );
$data  = json_decode( $body, true );
$email = isset( $data['email'] ) ? trim( $data['email'] ) : '';

if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
	http_response_code( 422 );
	exit( json_encode( [ 'error' => 'Email non valida' ] ) );
}

$csv_file  = __DIR__ . '/subscribers.csv';
$timestamp = gmdate( 'Y-m-d H:i:s' ) . ' UTC';

/* Prima scrittura: aggiunge l'intestazione */
if ( ! file_exists( $csv_file ) ) {
	file_put_contents( $csv_file, "email,subscribed_at\n", LOCK_EX );
}

/* Evita duplicati (scansione lineare, adatta a volumi contenuti) */
$existing = file_get_contents( $csv_file );
if ( str_contains( $existing, $email ) ) {
	exit( json_encode( [ 'status' => 'already_subscribed' ] ) );
}

$row = '"' . str_replace( '"', '""', $email ) . '","' . $timestamp . '"' . "\n";
file_put_contents( $csv_file, $row, FILE_APPEND | LOCK_EX );

exit( json_encode( [ 'status' => 'ok' ] ) );
