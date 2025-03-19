<?php
include 'db.php';

// Fetch all posts from the database
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>All Blog Posts</h1>
        <a href="create.php"><button>Add New Post</button></a>
        <hr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h2><a href='view.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</a></h2>";
                echo "<p>" . nl2br(htmlspecialchars(substr($row['content'], 0, 150))) . "...</p>";
                echo "<small>Published on: " . $row['created_at'] . "</small>";
                echo "<br><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
                echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this post?\")'>Delete</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No posts available.</p>";
        }
        ?>
    </div>
</body>
</html>
