<?php

// index.php

declare(strict_types=1);

// // Autoload classes
// spl_autoload_register(function ($class) {
//     require __DIR__ . "/src/$class.php";
// });

// // Set up error and exception handling
// set_error_handler('ErrorHandler::handleError');
// set_exception_handler('ErrorHandler::handleException');

// // Set response header
// header('content-type: application/json; charset=UTF=8');

// // Extract request URI parts
// $parts = explode('/', $_SERVER['REQUEST_URI']);

// // Check if the request is related to products
// if ($parts[2] != "products") {
//     http_response_code(404);
//     exit;
// }

// // Extract product ID from the URL
// $id = $parts[3] ?? null;

// // Establish database connection
// $database = new Database('localhost', '01_rest_api', 'root', '');
// $database->getConnection();

// // Instantiate ProductGateway and ProductController
// $gateway = new ProductGateway($database);
// $controller = new ProductController($gateway);

// // Process the request
// $controller->processtRequest($_SERVER['REQUEST_METHOD'], $id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTful API Demo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-r4f5Pq91NQ50T7DbXcv3vnnN4mffCGzr+kfjzWzOMgxCFC0j8f1JcFqBDXyY4j2H" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        .jumbotron {
            background-color: #343a40;
            color: #fff;
        }

        .developer-section {
            background-color: #f8f9fa;
            padding: 50px 0;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to the RESTful API Demo</h1>
            <p class="lead">This is a demonstration of a RESTful API built with PHP and MySQL.</p>
            <hr class="my-4">
            <p>This API allows you to perform various CRUD operations on a collection of products.</p>
            <p>Click the button below to interact with the API.</p>
        </div>
        <div class="text-start">
            <a class="btn btn-lg btn-dark" href="api.php" type="button">Go to API</a>

        </div>

        <div class="developer-section">
            <h2>About the Developer</h2>
            <p>Hi, I'm Joshua Aigbiremhon, a Web Developer with proficiency in PHP, Laravel & MySQL, Node.js, Express
                & MongoDB, as well as WordPress.</p>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (Bootstrap JS + Popper JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HO3nbPezB/zzS02kZGqdyvcQKl1TkIaFucIhUDb5GggGY3/igfG52t+RX9Zj6s2f" crossorigin="anonymous"></script>
</body>

</html>