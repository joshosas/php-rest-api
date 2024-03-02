<?php

// src/ProductController.php

class ProductController
{
    public function __construct(private ProductGateway $gateway)
    {
    }

    // Process incoming requests
    public function processtRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processResourceReq($method, $id);
        } else {
            $this->processCollectionReq($method);
        }
    }

    // Process resource-specific requests
    private function processResourceReq(string $method, string $id): void
    {
        // Retrieve the product by ID
        $product = $this->gateway->get($id);

        // If the product doesn't exist, return a 404 response
        if (!$product) {
            http_response_code(404);
            echo json_encode(["message" => "Product Not Found!"]);
            return;
        }

        // Process the request based on the HTTP method
        switch ($method) {
            case 'GET':
                echo json_encode($product);
                break;

            case 'PATCH':
                // Update the product with the provided data
                $data = (array) json_decode(file_get_contents("php://input"), true);
                $rows = $this->gateway->update($product, $data);
                echo json_encode([
                    "message" => "Product $id Updated",
                    "rows" => $rows
                ]);
                break;

            case 'DELETE':
                // Delete the product
                $rows = $this->gateway->delete($id);
                echo json_encode([
                    "message" => "Product $id deleted",
                    "rows" => $rows
                ]);
                break;

            default:
                // Return a 405 Method Not Allowed response for unsupported methods
                http_response_code(405);
                header("Allow: GET, PATCH, DELETE");
                break;
        }
    }

    // Process collection-wide requests
    private function processCollectionReq(string $method): void
    {
        switch ($method) {
            case 'GET':
                // Retrieve all products
                echo json_encode($this->gateway->getAll());
                break;

            case 'POST':
                // Create a new product with the provided data
                $data = (array) json_decode(file_get_contents("php://input"), true);
                $id = $this->gateway->create($data);
                // Return a 201 Created response with the ID of the newly created product
                http_response_code(201);
                echo json_encode([
                    "message" => "Product created",
                    "id" => $id
                ]);
                break;

            default:
                // Return a 405 Method Not Allowed response for unsupported methods
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }
}
