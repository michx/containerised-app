<?php
$host = 'db';
$dbname = 'ecommerce';
$user = 'maroine';
$pass = 'maroine';

$conn = new mysqli($host, $user, $pass, $dbname);

// Controllo se la connessione ha avuto successo
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>

