<?php

// Include the database connection file
require_once 'db_connection.php';

// Retrieve tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

// Prepare an array to store the tasks
$tasks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the tasks as JSON response
header('Content-Type: application/json');
echo json_encode($tasks);
