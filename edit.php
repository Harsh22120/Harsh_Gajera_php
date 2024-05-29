<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $slug = $_POST['slug'];

    $query = "UPDATE articles SET title='$title', description='$description', category='$category', slug='$slug' WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    $query = "SELECT * FROM articles WHERE id=$id";
    $result = $conn->query($query);
    $article = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Article</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $article['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $article['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="Food" <?php if ($article['category'] == 'Food') echo 'selected'; ?>>Food</option>
                    <option value="Educations" <?php if ($article['category'] == 'Educations') echo 'selected'; ?>>Educations</option>
                    <option value="Businessmen" <?php if ($article['category'] == 'Businessmen') echo 'selected'; ?>>Businessmen</option>
                    <option value="Positions" <?php if ($article['category'] == 'Positions') echo 'selected'; ?>>Positions</option>
                </select>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="<?php echo $article['slug']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
