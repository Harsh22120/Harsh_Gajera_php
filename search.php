<?php
include 'config.php';

$search = $_GET['search'] ?? '';
$query = "SELECT * FROM articles WHERE title LIKE ? OR description LIKE ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$searchTerm = "%$search%";
$stmt->bind_param('ss', $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()): ?>
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
