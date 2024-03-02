<?php

// src/ErrorHandler.php

class ErrorHandler
{
    // Handle exceptions by returning a JSON-encoded error response
    public static function handleException(Throwable $exception): void
    {
        http_response_code(500);
        echo json_encode([
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine()
        ]);
    }

    // Convert errors to exceptions
    public static function handleError(
        int $errno,
        string $errstr,
        string $errfile,
        int $errline
    ): bool {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }
}

// Now I will like to have a Front end that can interact with this RESTFul API.

// Please update the index.php page with some HTML and style with Bootstrap. It should have extensive information about the API, what it can do and how to interact with it. The have a Text and button that points to an "api.php" page. It should also have a section that talks about the developer (that's me; "Joshua Aigbiremhon", a Web Developer with proficiency in PHP, Laravel & MySQL, and, Nodejs, Express & MongoDB as well as WordPress).

// The "api.php" file codes should contain sections for interacting with all the end points of the API system, places to nicely display results and errors if any. 

// Add custom JavaScript and CSS if you have to. Use Bootstrap for the Layouts and Design, including icons where necessary, the major colors should be Bootstrap's Success, Dark & Light.
