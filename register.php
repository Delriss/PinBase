<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Finley Pettit">
    <link rel="icon" href="./img/favicon.ico" type="favicon">
    <title>PinBase - Register</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="./stylesheets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Stylesheets -->
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="area">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <!-- Navbar -->
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-0"><a href="./index" class="text-white text-decoration-none titleFont">PinBase</a></h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link" aria-current="page" href="./index">Home</a>
                        <a class="nav-link" href="./createPin">Create a Pin</a>
                        <a class="nav-link" href="./viewPins">View Pins</a>
                        <a class="nav-link active" href="./login">Login</a>
                    </nav>
                </div>
            </header>
            <!-- Navbar -->
            <!--Main-->
            <main class="px-3">
                <div class="container rounded">
                    <img src="./img/logo.png" alt="PinBase" width="100" height="100" class="d-inline-block align-text-top">
                    <h1 class="display-4 titleFont">Register</h1>
                    <hr>
                    <form id="createUser">
                        <input type="hidden" name="recapToken" id="recapToken">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="username" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="firstName" class="form-control" id="firstName" name="firstName">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Last Name</label>
                            <input type="lastName" class="form-control" id="lastName" name="lastName">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary aniButton">Login</button>
                        
                    </form>
                    <span>Already have an account? Login <a class="text-white" href="./login">here!</a></span>
                </div>
            </main>
            <!--Main-->
            <!--Footer-->
            <footer class="mt-auto text-white-50">
                <p><a href="./index" class="text-white">Pinbase</a> - Developed by Finley Pettit.</p>
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
    <script src="https://www.google.com/recaptcha/api.js?render=6Ld55UAkAAAAADqgU6Wjw1hHORSUgTX7e4mn85Rq"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/scripts.js"></script>
    <!-- Script Imports -->
</body>

</html>