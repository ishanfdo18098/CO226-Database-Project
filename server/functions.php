<?php

function connectToDB()
{
    $servername = "localhost";
    $db_name = "id18333488_site";
    $username = "id18333488_user";
    $password = "wGskxx!o>b=8Rj8)";


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function printHeader()
{
    echo ('
    <head>
    <link rel="icon" href="/assets/img/favicon.png">

<!-- Stylesheets -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<!-- Load brand icons -->
<link href="/assets/fontawesome/fontawesome.min.css" rel="stylesheet">
<link href="/assets/fontawesome/solid.min.css" rel="stylesheet">
<link href="/assets/fontawesome/brands.min.css" rel="stylesheet">
<link href="/assets/css/allCSS.css" rel="stylesheet">

<!-- JavaScript files -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
    </head>
');
}

function printNavbar()
{
    echo ('<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="{% link pages/home.html %}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4"><img src="/assets/img/header-logo.png" alt=""></span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>

            <li class="nav-item"><a href="/about.php" class="nav-link">Alumni</a></li>
            
        </ul>
    </header>
</div>');
}

function printFooter()
{
    echo ('<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
       
        <p class="col-md-6 mb-1 text-muted" style="font-size:80%;">&copy; COPYRIGHT 2022 DEPARTMENT OF COMPUTER ENGINEERING, UOP
        </p>
    </footer>
</div>');
}
