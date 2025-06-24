<?php
include 'includes/config.php';
include 'includes/header.php';

$result = $conn->query("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC");

while ($row = $result->fetch_assoc()):
?>
<div class="post">
    <h3><a href="view.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
    <p>By <?= htmlspecialchars($row['username']) ?> on <?= $row['created_at'] ?></p>
    <?php if ($row['image']): ?>
        <img src="<?= $row['image'] ?>" alt="Post image">
    <?php endif; ?>
    <p><?= substr(strip_tags($row['content']), 0, 200) ?>...</p>
</div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>
