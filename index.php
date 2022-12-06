<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Finley Pettit">
    <link rel="icon" href="./img/favicon.ico" type="favicon">
    <title>PinBase - Home</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="./stylesheets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- Stylesheets -->

</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="area">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <!-- Navbar -->
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-0"><a href="./index.php" class="text-white text-decoration-none titleFont">PinBase</a></h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        <a class="nav-link" href="./createPin.php">Create a Pin</a>
                        <a class="nav-link" href="#">Login/Register</a>
                    </nav>
                </div>
            </header>
            <!-- Navbar -->
            <!--Main-->
            <main class="px-3">
                <img src="./img/logo.png" alt="PinBase" width="200" height="200" class="d-inline-block align-text-top">
                <h1 class="display-1 titleFont">Welcome to PinBase!</h1>
                <hr>
                <p class="lead">Create saveable text snippets to store and share around with friends! PinBase is your own repository of information, with detailed statistics for each of your pins.</p>
                <p class="lead">
                    <a href="./createPin.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white text-dark aniButton">Create a Pin</a>
                    <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white text-dark aniButton">View Pins</a>
                </p>
            </main>
            <!--Main-->
            <!--Footer-->
            <footer class="mt-auto text-white-50">
                <p><a href="./index.php" class="text-white">Pinbase</a> - Developed by Finley Pettit.</p>
                <p>&copy; Del</p>
            </footer>
            <!--Footer-->
        </div>


        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>


    <!-- Script Imports -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Script Imports -->
</body>

</html>