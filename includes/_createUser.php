<?php

if (empty($_POST['email']) || 
    empty($_POST['username']) || 
    empty($_POST['password']))
{
    die( "Please fill out all fields.");
}


//Generates a random UUIDv4 according to the RFC4122 standard.
function GenUUIDv4()
{
    $data = random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
$captcha = $_POST['recapToken'];
$secretKey = $_ENV["CAPTCHA_PRIVATE"];
$reCAPTCHA = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha)));
if ($reCAPTCHA->score <= 0.6){
    die("Captcha failed.");
}
//Connect to database
require_once("./_connect.php");

//Get info from form
$email = $_POST['email'];
$username = $_POST['username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];

//Encrypt Password with BCrypt
$password = password_hash($password, PASSWORD_BCRYPT);

//Escape Strings
$UUID = GenUUIDv4(); //Create UUID
$email = mysqli_real_escape_string($connect, $email); 
$username = mysqli_real_escape_string($connect, $username);
$firstName = mysqli_real_escape_string($connect, $firstName);
$lastName = mysqli_real_escape_string($connect, $lastName);
$password = mysqli_real_escape_string($connect, $password);

//Create database entry
$sql = "INSERT INTO `tblUsers`(
                            `UUID`, 
                            `username`, 
                            `email`, 
                            `firstName`,
                            `lastName`,
                            `password`, 
                            `access_level`, 
                            `TIMESTAMP`) 
                        VALUES (
                                ?, 
                                ?, 
                                ?, 
                                ?,
                                ?,
                                ?,
                                'user',
                                CURRENT_TIMESTAMP())";

$stmt = mysqli_prepare($connect, $sql); //Prepare SQL Query
mysqli_stmt_bind_param($stmt, "ssssss", $UUID, $username, $email, $firstName, $lastName, $password); //Bind Parameters

if(mysqli_stmt_execute($stmt))
    echo "User Created";
else
    echo "Error Creating User: " . mysqli_error($connect);
