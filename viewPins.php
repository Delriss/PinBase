<?php //Detect if user is logged in
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ./login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Finley Pettit">
    <link rel="icon" href="./img/favicon.ico" type="favicon">
    <title>PinBase - View Pins</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="./stylesheets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Stylesheets -->

</head>

<body class="bg-white">

    <!-- Navbar -->
    <div class="container-fluid d-flex h-100 p-3 mx-auto flex-column text-light bg-dark">
        <header class="mb-auto">
            <div class="w-100 d-flex justify-content-around">
                <div class="d-flex justify content-center align-items-center">
                    <img src="./img/logo.png" width="50" height="50" class="d-inline-block me-2">
                    <h3 class="float-md-end mb-0"><a href="./index" class="text-white text-decoration-none titleFont">PinBase</a></h3>
                </div>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link" aria-current="page" href="./index">Home</a>
                    <a class="nav-link" href="./createPin">Create a Pin</a>
                    <a class="nav-link active" href="./viewPins">View Pins</a>
                    <a class="nav-link" href="./login">Login</a>
                </nav>
            </div>
        </header>
    </div>
    <!-- Navbar -->

    <!-- Main -->
    <div class="container-fluid d-flex align-items-center flex-column p-3">
        <div class="d-flex justify-content-center align-items-center flex-column min-vh-10">
            <div class="display-5 fw-bold titleFont">View Pins!</div>
            <p class="lead mb-4">Here you can view all the Pins that have been created!</p>
        </div>
    </div>

    <div class="b-example-divider"></div>

    <div class="container-fluid d-flex align-items-center flex-column min-vh-100 p-3">
        <div class="container-fluid d-flex justify-content-around flex-wrap" id="viewPins" name="viewPins">
            <!--IMPORT PINS HERE-->
            
        </div>
    </div>
    <!-- Main -->

    <!-- Footer -->
    <footer class="container-fluid mt-auto text-white-50 bg-dark d-flex justify-content-center flex-column align-items-center">
        <p><a href="./index" class="text-white">Pinbase</a> - Developed by Finley Pettit.</p>
        <p>&copy; Del</p>
    </footer>
    <!-- Footer -->

    <!-- Script Imports -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="./js/scripts.js"></script>
    <!-- Script Imports -->
</body>

</html>