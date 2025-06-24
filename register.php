<?php
include 'includes/config.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<p>Registered successfully. <a href='login.php'>Login here</a>.</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
}
?>

<h2>Register</h2>
<form method="POST">
    <input type="text" name="username" required placeholder="Username">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <input type="submit" value="Register">
</form>

<?php include 'includes/footer.php'; ?>
