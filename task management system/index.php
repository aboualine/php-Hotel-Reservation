<?php
include 'config/database.php';
include 'includes/functions.php';
include 'includes/header.php';

$search = $_GET['search'] ?? '';
$tasks = $search ? searchTasks($conn, $search) : getAllTasks($conn);
?>

<div class="container mt-5">
    <h1 class="mb-4">Task Management System</h1>
    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search tasks..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <a href="create.php" class="btn btn-primary mb-3">Add New Task</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= htmlspecialchars($task['title']) ?></td>
                <td><?= htmlspecialchars($task['description']) ?></td>
                <td><?= $task['due_date'] ?></td>
                <td><?= $task['status'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $task['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $task['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>