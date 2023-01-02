<?php
session_start();

//Connect to DB
require_once("./_connect.php");

//Search DB for pin ID from pin URL
$pinID = $_GET['pin'];
$sql = "SELECT * FROM tblPins WHERE pinID = '$pinID'";

//Get pin info
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$pinName = $row['pinName'];
$visibility = $row['visibility'];
$expiry = $row['expiry'];
$password = $row['password'];
$pinText = $row['pinText'];
$timestamp = $row['TIMESTAMP'];
$userID = $row['userID'];

//Get user info
$sql = "SELECT * FROM tblUsers WHERE UUID = '$userID'";
$result2 = mysqli_query($connect, $sql);
$row2 = mysqli_fetch_assoc($result2);
$username = $row2['username'];

echo json_encode(array("pinName" => $pinName, "visibility" => $visibility, "expiry" => $expiry, "password" => $password, "pinText" => $pinText, "timestamp" => $timestamp, "userID" => $userID, "username" => $username));

?>