<?php
include 'includes/config.php';
include 'includes/header.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION["user_id"] = $id;
        header("Location: index.php");
    } else {
        echo "<p>Invalid credentials.</p>";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <input type="submit" value="Login">
</form>

<?php include 'includes/footer.php'; ?>
