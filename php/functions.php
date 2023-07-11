<?php
function getTasks()
{
    // Retrieve tasks from the database and return an associative array
    global $conn;
    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    $tasks = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[$row["task_id"]] = array(
                "description" => $row["description"],
                "due_date" => $row["due_date"],
                "status" => $row["status"]
            );
        }
    }

    return $tasks;
}

function updateTask($taskId, $description, $dueDate, $status)
{
    global $conn;
    $sql = "UPDATE tasks SET description = '$description', due_date = '$dueDate', status = '$status' WHERE task_id = '$taskId'";
    return $conn->query($sql);
}

function deleteTask($taskId)
{
    global $conn;
    $sql = "DELETE FROM tasks WHERE task_id = '$taskId'";
    return $conn->query($sql);
}

function insertTask($description, $dueDate, $status)
{
    global $conn;
    $sql = "INSERT INTO tasks (description, due_date, status) VALUES ('$description', '$dueDate', '$status')";
    return $conn->query($sql);
}
?>
