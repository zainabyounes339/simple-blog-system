<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($title) && !empty($content)) {
        $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $title, $content);

        if ($stmt->execute()) {
            echo "<p>Post added successfully!</p>";
            echo "<a href='index.php'>Go back to home</a>";
        } else {
            echo "<p>Error adding post.</p>";
        }
    } else {
        echo "<p>All fields are required!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Post</h1>
        <form method="POST" action="create.php">
            <label>Title:</label><br>
            <input type="text" name="title" required><br><br>

            <label>Content:</label><br>
            <textarea name="content" rows="5" required></textarea><br><br>

            <button type="submit">Add Post</button>
        </form>
        <br>
        <a href="index.php">Go back to home</a>
    </div>
</body>
</html>
