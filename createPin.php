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
    <title>PinBase - New Pin</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="./stylesheets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Stylesheets -->

</head>

<body class="bg-white">

    <!-- Navbar -->
    <div class="container-fluid d-flex h-100 p-3 mx-auto flex-column text-light bg-dark">
        <header class="mb-auto">
            <div class="w-100 d-flex  justify-content-around">
                <div class="d-flex justify content-center align-items-center">
                    <img src="./img/logo.png" width="50" height="50" class="d-inline-block me-2">
                    <h3 class="float-md-end mb-0"><a href="./index" class="text-white text-decoration-none titleFont">PinBase</a></h3>
                </div>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link" aria-current="page" href="./index">Home</a>
                    <a class="nav-link active" href="./createPin">Create a Pin</a>
                    <a class="nav-link" href="./login">Login</a>
                </nav>
            </div>
        </header>
    </div>
    <!-- Navbar -->

    <!-- Main -->
    <form id="createPin">
        <!-- HEADER BLOCK -->
        <div class="px-4 py-5 my-5 text-center">
            <!-- Title -->
            <h1 class="display-5 fw-bold titleFont">Create a Pin!</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Enter text to save and share. This can be: code, lyrics, documentation and more!</p>
                <!-- Title -->
                <!--Pin Name-->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Pin Name</span>
                    <input type="pinName" id="pinName" name="pinName" class="form-control" placeholder="Pin Name" aria-label="Pin Name">
                </div>
                <!--Pin Name-->
                <!--Pin Selectors-->
                <div class="input-group mb-3">
                    <label class="input-group-text" for="visibility">Visibility</label>
                    <select class="form-select" id="visibility" name="visibility">
                        <option value="1">Public</option>
                        <option value="2">Private</option>
                    </select>
                </div>
                <div class="input-group">
                    <label class="input-group-text">Expiry</label>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="expiryCheck" name="expiryCheck" aria-label="Radio button for following text input">
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with radio button" id="expiryDate" name="expiryDate" placeholder="DD/MM/YYYY">
                </div>
                <div class="input-group pt-3">
                    <label class="input-group-text">Password</label>
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="passwordCheck" name="passwordCheck" aria-label="Radio button for following text input">
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with radio button" id="password" name="password" placeholder="Enter password...">
                </div>
                <!--Pin Selectors-->
                <!--Pin Content-->
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center pt-3">
                    <button type="submit" class="btn btn-primary btn-lg px-4 gap-3">Save Pin</button>
                    <button type="reset" class="btn btn-outline-secondary btn-lg px-4">Clear Pin</button>
                </div>
                <!--Pin Content-->
            </div>
        </div>
        <!-- HEADER BLOCK -->

        <div class="b-example-divider"></div>

        <!-- INPUT BLOCK -->
        <div class="px-4 py-5 my-5 text-center">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="pinText" name="pinText" style="min-height: 175px"></textarea>
                <label for="pinText">Snippet Area</label>
            </div>
        </div>
        <!-- INPUT BLOCK -->
    </form>
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