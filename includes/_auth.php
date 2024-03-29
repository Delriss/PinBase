<?php
if(!isset($_POST['email']) || !isset($_POST['password'])) {
    header("Location: ../login");
}

require_once("./_connect.php"); //Connect to Database

$email = $_POST['email']; //Grab Email
$password = $_POST['password']; //Grab Password

$email = mysqli_real_escape_string($connect, $email); //Escape Email
$password = mysqli_real_escape_string($connect, $password); //Escape Password

//Captcha check
$captcha = $_POST['recapToken'];
$secretKey = $_ENV["CAPTCHA_PRIVATE"];
$reCAPTCHA = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha)));
if ($reCAPTCHA->score <= 0.6){
    die("Captcha failed.");
}

$sql = "SELECT * FROM tblUsers WHERE email = ?"; //SQL Query
$stmt = mysqli_prepare($connect, $sql); //Prepare SQL Query
mysqli_stmt_bind_param($stmt, "s", $email); //Bind Parameters
mysqli_stmt_execute($stmt); //Execute Query
$result = mysqli_stmt_get_result($stmt); //Get Result


if (mysqli_num_rows($result) == 1) { //Checks if info matches database
    $row = mysqli_fetch_assoc($result); //Fetch Result

    if (password_verify($password, $row['password'])) { //If Password is Correct
        session_start(); //Start Session
        $_SESSION['loggedin'] = true; //Set Logged In
        $_SESSION['id'] = $row['UUID']; //Set ID
        $_SESSION['username'] = $row['username']; //Set Username
        $_SESSION['email'] = $email; //Set Email
        $_SESSION['firstName'] = $row['firstName']; //Set First Name
        $_SESSION['lastName'] = $row['lastName']; //Set Last Name
        
        echo "You have successfully logged in.";
    } else { //If Password is Incorrect
        echo "Password is incorrect.";
    }
} else {
    echo "Email is incorrect.";
}


mysqli_stmt_close($stmt); //Close Statement
