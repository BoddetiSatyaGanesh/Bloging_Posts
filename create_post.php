<?php
include 'includes/config.php';
include 'includes/header.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title   = $_POST["title"];
    $content = $_POST["content"];
    $image = "";

    if ($_FILES["image"]["name"]) {
        $image = "uploads/" . time() . "_" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $_SESSION["user_id"], $title, $content, $image);
    $stmt->execute();
    echo "<p>Post created successfully.</p>";
}
?>

<h2>Create Post</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" required placeholder="Title">
    <textarea name="content" required placeholder="Your blog content..."></textarea>
    <input type="file" name="image">
    <input type="submit" value="Publish">
</form>

<?php include 'includes/footer.php'; ?>
