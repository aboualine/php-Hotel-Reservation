<?php
function getAllTasks($conn) {
    $stmt = $conn->query("SELECT * FROM tasks");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTaskById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function createTask($conn, $title, $description, $due_date, $status) {
    $stmt = $conn->prepare("INSERT INTO tasks (title, description, due_date, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $due_date, $status]);
}

function updateTask($conn, $id, $title, $description, $due_date, $status) {
    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, due_date = ?, status = ? WHERE id = ?");
    $stmt->execute([$title, $description, $due_date, $status, $id]);
}

function deleteTask($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
}

function searchTasks($conn, $search) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE title LIKE ? OR description LIKE ?");
    $stmt->execute(["%$search%", "%$search%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>