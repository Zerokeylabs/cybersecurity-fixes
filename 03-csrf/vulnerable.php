<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newpass = $_POST['newpass'];

    // Assume user is always logged in as admin
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = 'admin'");
    $stmt->bind_param("s", $newpass);
    $stmt->execute();
    $stmt->close();

    echo "Password changed to: " . htmlspecialchars($newpass);
}
?>

<h2>Change Password (No CSRF Protection)</h2>
<form method="POST">
    New Password: <input type="text" name="newpass">
    <button type="submit">Change</button>
</form>