<?php
require_once 'db_connection.php';
require_once 'functions.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $dueDate = $_POST["due_date"];
    $status = $_POST["status"];

    // Insert task into the database
    insertTask($description, $dueDate, $status);

    // Redirect back to the index page
    header("Location: ../index.html");
    exit();
}
?>
