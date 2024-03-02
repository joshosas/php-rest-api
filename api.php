<?php

// api.php

// Include necessary files
require_once 'src/Database.php';
require_once 'src/ProductGateway.php';
require_once 'src/ProductController.php';
require_once 'src/ErrorHandler.php';

// Set up error handling
set_error_handler('ErrorHandler::handleError');
set_exception_handler('ErrorHandler::handleException');

// Handle requests to API endpoints
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET requests
    // Example: Retrieve all products
    $database = new Database('localhost', '01_rest_api', 'root', '');
    $database->getConnection();
    $gateway = new ProductGateway($database);
    $controller = new ProductController($gateway);
    $controller->processtRequest('GET', null);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST requests
    // Example: Create a new product
    $database = new Database('localhost', '01_rest_api', 'root', '');
    $database->getConnection();
    $gateway = new ProductGateway($database);
    $controller = new ProductController($gateway);
    $controller->processtRequest('POST', null);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    // Handle PATCH requests
    // Example: Update a product
    $database = new Database('localhost', '01_rest_api', 'root', '');
    $database->getConnection();
    $gateway = new ProductGateway($database);
    $controller = new ProductController($gateway);
    $controller->processtRequest('PATCH', $_GET['id'] ?? null);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Handle DELETE requests
    // Example: Delete a product
    $database = new Database('localhost', '01_rest_api', 'root', '');
    $database->getConnection();
    $gateway = new ProductGateway($database);
    $controller = new ProductController($gateway);
    $controller->processtRequest('DELETE', $_GET['id'] ?? null);
} else {
    // Invalid request method
    http_response_code(405);
    header("Allow: GET, POST, PATCH, DELETE");
}
