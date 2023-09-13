# API Documentation

This is a comprehensive documentation for the API.

## Table of Contents

- [Request/Response Formats](#requestresponse-formats)
- [Status codes](#status-codes)
- [Sample Usage](#sample-usage)
- [Local and Server Deployment](#local-and-server-deployment)

## Request/Response Formats
The request and response format in this project is json.

## Status codes

> The following are the HTTP status codes that are found in this project and their meanings:

### Status Code: 201
Meaning: This status code indicates that the request has been successfully fulfilled, and as a result, a new resource has been created on the server. It is typically used in response to successful POST requests when creating a new resource. The response often includes the newly created resource's details in the response body.

### Status Code: 409
Meaning: This status code indicates that the request could not be completed due to a conflict with the current state of the target resource. It often occurs when there is a conflict between the client's request and the current state of the server, such as attempting to create a resource with a duplicate key.

### Status Code: 404
Meaning: This status code indicates that the server could not find the requested resource. It is commonly used when a client requests a resource that doesn't exist on the server or when the server cannot disclose whether it exists or not for security reasons.

### Status Code: 200
Meaning: This status code indicates that the request has been successfully processed, and the server is responding with the requested data. It is the standard response for successful GET requests and indicates that the server has fulfilled the request.

### Status Code: 204
Meaning: This status code indicates that the request has been successfully processed, and there is no additional content to send in the response body. It is often used for successful DELETE or PUT requests where the server acknowledges the request but does not return any data in the response body.

## Sample Usage

### Create a Person

**Request:**

```http
Endpoint: `POST /api`

- Request Body:

name (string, required): The name of the person to create.

Request:
POST /api
Content-Type: application/json

{
    "name": "Mark Essien"
}

### Response(201 Created):
{
    "id": 1,
    "name": "Mark Essien"
}
```

### Read a Person

**Request:**

```http
Endpoint: GET /api/{id}
Retrieve details of a person by ID.

Request:
GET /api/1

### Response(200 OK):
{
    "id": 1,
    "name": "Mark Essien"
}
```

### Update a Person

**Request:**

```http
Endpoint: PUT /api/{id}
Update the details of an existing person by ID.

Request:
PUT /api/1
Content-Type: application/json

{
    "name": "Mary Essien"
}

### Response(200 OK):
{
    "id": 1,
    "name": "Mary Essien"
}
```

### Delete a Person

**Request:**

```http
Endpoint: DELETE /api/{id}
Delete a person by ID.

Request:
DELETE /api/{id}

### Response(204 No content)
```

## Local Deployment
To deploy the API locally for development and testing purposes, follow these steps:

- Clone the repository to your local machine: `git clone https://github.com/your-username/your-repo.git`
- Navigate to the project directory: `cd your-repo`
- Install Composer dependencies: `composer install`
- Configure your environment variables by copying the .env.example file to .env: `cp .env.example .env`
- Generate an application key: `php artisan key:generate`
- Set up your database connection in the .env file. Make sure to specify your MySQL database credentials: DB_CONNECTION=mysql
DB_HOST=your-mysql-host
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-database-username
DB_PASSWORD=your-database-password
- Run database migrations to create the necessary tables: `php artisan migrate`
- Start the local development server: `php artisan serve`
- Your API should now be accessible locally at `http://localhost:8000.`

