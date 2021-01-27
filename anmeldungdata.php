<?php
require_once 'anmeldungoop.php';
require_once 'database.php';
require_once 'anmeldung.php';


$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$login = new Login($username, $password);

$login->login($conn);
?>