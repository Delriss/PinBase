<?php
require_once("EnvConfigReader.php");

GetSettings();

$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$database = $_ENV['DB_NAME'];

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    die("Connection Failed.");
}
