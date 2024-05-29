<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $query = "DELETE FROM articles WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo "Article deleted successfully.";
    } else {
        echo "Error deleting article.";
    }
}
?>
