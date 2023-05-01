<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "message_board";

// Get the message from the request body
$message = json_decode(file_get_contents('php://input'))->message;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the new message into the database
$sql = "INSERT INTO messages (message) VALUES ('" . $conn->real_escape_string($message) . "')";
if ($conn->query($sql) === TRUE) {
  http_response_code(201);
} else {
  http_response_code
