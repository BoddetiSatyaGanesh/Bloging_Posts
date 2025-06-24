<?php
include 'includes/config.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$post_id = $_POST["post_id"];
$user_id = $_SESSION["user_id"];
$comment = $_POST["comment"];

$stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $post_id, $user_id, $comment);
$stmt->execute();

header("Location: view.php?id=" . $post_id);
exit;
