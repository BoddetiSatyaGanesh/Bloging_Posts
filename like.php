<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$post_id = $_POST["post_id"];
$user_id = $_SESSION["user_id"];

$stmt = $conn->prepare("INSERT IGNORE INTO likes (post_id, user_id) VALUES (?, ?)");
$stmt->bind_param("ii", $post_id, $user_id);
$stmt->execute();

header("Location: view.php?id=" . $post_id);
exit;
