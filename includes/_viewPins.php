<?php
session_start();

// Connect to the database
require_once("_connect.php");

//Get all pins from DB
$sql = "SELECT * FROM tblPins";
$result = mysqli_query($connect, $sql);

//Loop through all pins
foreach ($result as $row) {
    //Get pin info
    $pinID = $row['pinID'];
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

    //Check if pin is private
    if ($password != 0) {
        $private = true;
    } else {
        $private = false;
    }

    //Set if pin is visible
    if ($visibility == 1) {
        $visible = true;
    } else if ($visibility == 2) {
        if ($userID == $_SESSION['id']) {
            $visible = true;
        } else {
            $visible = false;
        }
    }

    //Check if pin is visible
    if ($visible == true) {
        //Check if pin is expired
        //Check if pin is private
        if ($private == false) {
            //Display pin
            echo "<div class='row p-1'>
                        <div class='col-12'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$pinName</h5>
                                    <h6 class='card-subtitle mb-2 text-muted'>Author: $username</h6>
                                    <h6 class='card-subtitle mb-2 text-muted'>Date Pinned: $timestamp</h6>
                                    <a href='./pin?pin=$pinID' class='btn btn-lg btn-secondary fw-bold border-dark bg-dark text-white aniButton'>View Pin</a>
                                    <a href='./pin?pin=$pinID' class='btn btn-lg btn-secondary fw-bold border-dark bg-dark text-white aniButton'>Copy Link</a>
                                </div>
                            </div>
                        </div>
                    </div>";
        } else {
            //Display pin
            echo "
                <div class='row p-1'>
                    <div class='col-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>$pinName</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Author: $username</h6>
                                <h6 class='card-subtitle mb-2 text-muted'>Date Pinned: $timestamp</h6>
                                <p class='card-text'>PRIVATE - Only you can see this!</p>
                                <a href='./pin?pin=$pinID' class='btn btn-lg btn-secondary fw-bold border-dark bg-dark text-white aniButton'>View Pin</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
    }
}
