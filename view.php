<?php
include 'includes/config.php';
include 'includes/header.php';
session_start();

$post_id = $_GET["id"];

$stmt = $conn->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    echo "<p>Post not found.</p>";
} else {
?>
<div class="post">
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <p>By <?= htmlspecialchars($post['username']) ?> on <?= $post['created_at'] ?></p>
    <?php if ($post['image']): ?>
        <img src="<?= $post['image'] ?>" alt="Image">
    <?php endif; ?>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<div class="like-comment">
    <form action="like.php" method="POST">
        <input type="hidden" name="post_id" value="<?= $post_id ?>">
        <input type="submit" value="Like" class="like-button">
    </form>

    <h3>Comments</h3>
    <form action="comment.php" method="POST">
        <textarea name="comment" required></textarea>
        <input type="hidden" name="post_id" value="<?= $post_id ?>">
        <input type="submit" value="Post Comment">
    </form>

    <?php
    $comments = $conn->query("SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE comments.post_id = $post_id ORDER BY comments.created_at DESC");
    while ($comment = $comments->fetch_assoc()):
    ?>
        <div class="comment">
            <strong><?= htmlspecialchars($comment['username']) ?>:</strong>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
    <?php endwhile; ?>
</div>
<?php
}
include 'includes/footer.php';
?>
