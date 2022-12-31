<?php
session_start();


if (empty($_POST['pinName']) || 
    empty($_POST['visibility']))
{
    die( "Please fill out all fields.");
}

function GenUUIDv4()
{
    $data = random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

//Connect to database
require_once("./_connect.php");

//Get info from form
$pinName = $_POST['pinName'];
$visibility = $_POST['visibility'];
if (isset($_POST['expiryCheck']))
{
    $expiryCheck = $_POST['expiryCheck'];
    $expiryDate = $_POST['expiryDate'];
}
else
{
    $expiryCheck = 0;
    $expiryDate = 0;
}
if(isset($_POST['passwordCheck']))
{
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT); //Encrypt Password with BCrypt
}
else
{
    $password = 0;
}
$pinText = $_POST['pinText'];

//Escape Strings
$UUID = GenUUIDv4(); //Create UUID
$userID = $_SESSION['id'];
$pinName = mysqli_real_escape_string($connect, $pinName);
$visibility = mysqli_real_escape_string($connect, $visibility);
$expiryDate = mysqli_real_escape_string($connect, $expiryDate);
$password = mysqli_real_escape_string($connect, $password);
$pinText = mysqli_real_escape_string($connect, $pinText);

//Create database entry
$sql = "INSERT INTO `tblPins`(
                            `pinID`, 
                            `userID`, 
                            `pinName`, 
                            `visibility`,
                            `expiry`,
                            `password`,
                            `pinText`,
                            `TIMESTAMP`) 
                        VALUES (
                                ?, 
                                ?, 
                                ?, 
                                ?,
                                ?,
                                ?,
                                ?,
                                CURRENT_TIMESTAMP)";

$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "sssssss", $UUID, $userID, $pinName, $visibility, $expiryDate, $password, $pinText);

if(mysqli_stmt_execute($stmt))
    echo "Pin Created";
else
    echo "Error Creating Pin: " . mysqli_error($connect);
