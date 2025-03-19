<?php

include 'db.php'; // Include database connection

// Check if post ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Execute delete query
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<p>Post deleted successfully!</p>";
    } else {
        echo "<p>Error deleting post.</p>";
    }
} else {
    echo "<p>No post selected for deletion.</p>";
}

echo "<br><a href='index.php'>Go back to home</a>";
?>
<link rel="stylesheet" href="css/style.css">
