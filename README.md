# RESTful API README

This repository contains the code for a simple RESTful API built using PHP. The API allows users to perform CRUD (Create, Read, Update, Delete) operations on a collection of products stored in a MySQL database.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Endpoints](#endpoints)
- [Contributing](#contributing)
- [License](#license)

## Features

- Create, read, update, and delete products.
- Retrieve all products or a specific product by its ID.
- Error handling for various scenarios.
- Simple frontend for interacting with the API.

## Requirements

- PHP (version 7 or higher)
- MySQL
- Web server (e.g., Apache, Nginx)
- Composer (for dependency management)
- Bootstrap (for frontend styling)

## Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/yourusername/php-rest-api.git
   ```

2. Navigate to the project directory:

   ```bash
   cd php-rest-api
   ```

3. Install dependencies using Composer:

   ```bash
   composer install
   ```

4. Import the `database.sql` file into your MySQL database to create the necessary table and seed data.

5. Configure the database connection settings in `src/Database.php` according to your MySQL setup.

6. Start your web server and make sure PHP is configured correctly.

## Usage

Use HTTP requests (e.g., `curl`, `httpie `, `Postman`) to interact with the API endpoints directly.

## Endpoints

The API provides the following endpoints:

- `GET /api.php`: Retrieves all products.
- `GET /api.php?id={product_id}`: Retrieves a specific product by its ID.
- `POST /api.php`: Creates a new product.
- `PATCH /api.php?id={product_id}`: Updates an existing product.
- `DELETE /api.php?id={product_id}`: Deletes a product.

## Contributing

Contributions are welcome! If you have any suggestions, improvements, or bug fixes, please open an issue or create a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/joshosas/php-rest-api/blob/main/LISCENCE) file for details.
