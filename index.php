<?php
include 'config.php';

$query = "SELECT * FROM articles ORDER BY created_at DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">All Articles</h1>
        <a class="btn btn-primary mb-3" href="create.php">Create New Article</a>
        <input type="text" id="search" class="form-control mb-3" placeholder="Search articles...">
        <div id="articles">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row['title']; ?></h2>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $row['category']; ?> - <?php echo $row['created_at']; ?></small></p>
                        <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="btn btn-danger delete-article" data-id="<?php echo $row['id']; ?>" href="#">Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
