<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    if (!$post) {
        echo "<p>Post not found.</p>";
        echo "<a href='index.php'>Go back to home</a>";
        exit();
    }
} else {
    echo "<p>No post selected.</p>";
    echo "<a href='index.php'>Go back to home</a>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_title = $_POST['title'];
    $new_content = $_POST['content'];

    if (!empty($new_title) && !empty($new_content)) {
        $update_sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssi", $new_title, $new_content, $id);

        if ($update_stmt->execute()) {
            echo "<p>Post updated successfully!</p>";
            echo "<a href='index.php'>Go back to home</a>";
        } else {
            echo "<p>Error updating post.</p>";
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
    <title>Edit Post</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>
        <form method="POST" action="edit.php?id=<?php echo $id; ?>">
            <label>Title:</label><br>
            <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>

            <label>Content:</label><br>
            <textarea name="content" rows="5" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>

            <button type="submit">Save Changes</button>
        </form>
        <br>
        <a href="index.php">Go back to home</a>
    </div>
</body>
</html>
