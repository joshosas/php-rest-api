<?php

// src/ProductGateway.php

class ProductGateway
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        // Establish database connection
        $this->conn = $database->getConnection();
    }

    // Retrieve all products from the database
    public function getAll(): array
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->conn->query($sql);
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    // Insert a new product into the database
    public function create(array $data): string
    {
        $sql = "INSERT INTO product (name, size, is_available) VALUES (:name, :size, :is_available)";
        $stmt = $this->conn->prepare($sql);
        // Bind parameters
        $stmt->bindValue(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindValue(":size", $data["size"] ?? 0, PDO::PARAM_INT);
        $stmt->bindValue(":is_available", $data["is_available"] ?? false, PDO::PARAM_BOOL);
        // Execute query
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    // Retrieve a product by its ID from the database
    public function get(string $id): array | false
    {
        $sql = "SELECT * FROM product WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data !== false) {
            $data['is_available'] = (bool) $data['is_available'];
        }
        return $data;
    }

    // Update an existing product in the database
    public function update(array $current, array $new): int
    {
        $sql = "UPDATE product SET name = :name, size = :size, is_available = :is_available WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        // Bind parameters
        $stmt->bindValue(":name", $new["name"] ?? $current["name"], PDO::PARAM_STR);
        $stmt->bindValue(":size", $new["size"] ?? $current["size"], PDO::PARAM_INT);
        $stmt->bindValue(":is_available", $new["is_available"] ?? $current["is_available"], PDO::PARAM_BOOL);
        $stmt->bindValue(":id", $current["id"], PDO::PARAM_INT);
        // Execute query
        $stmt->execute();
        return $stmt->rowCount();
    }

    // Delete a product from the database by its ID
    public function delete(string $id): int
    {
        $sql = "DELETE FROM product WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        // Bind parameter
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        // Execute query
        $stmt->execute();
        return $stmt->rowCount();
    }
}
