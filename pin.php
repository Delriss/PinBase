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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
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
    <?php
    //Connect to DB
    require_once("./includes/_connect.php");

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

    ?>
    <main class="min-vh-100">
        <div class="container-fluid p-3">
            <div class="text-center d-flex flex-column justify-content-center" id="pinInfo">
                <h1 class="titleFont"><?php echo $pinName ?></h1>
                <span id="author">Visibility: <?php if($visibility == 1){
                    echo "Public";
                } else {
                    echo "Private";
                } ?></span>
                <span id="timestamp">Made on: <?php echo $timestamp ?></span>
            </div>
        </div>

        <div class="b-example-divider"></div>

        <div class="container-fluid h-100 pt-3 d-flex justify-content-between">
            <div class="userBox">
                <div id="userInfo">
                    <div class="container d-flex justify-content-center">
                        <img src="./img/logo.png" width="100" height="100" class="d-inline-block me-2">
                    </div>
                    <div class="container d-flex justify-content-center">
                        <h3 class="titleFont" id="user"><?php echo $username ?></h3>
                    </div>
                </div>
            </div>
            <div class="pinBox rounded d-flex justify-content-center align-items-center">
                <div class="container-fluid pt-3" id="pinText">
                    <pre><code><?php echo htmlspecialchars($pinText) ?></code></pre>
                </div>
            </div>
        </div>
    </main>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
    <!-- Script Imports -->
</body>

</html>