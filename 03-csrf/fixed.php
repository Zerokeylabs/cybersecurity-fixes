<?php
session_start();
$conn = new mysqli("localhost", "root", "", "test");

// Generate token if not set
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['token']) {
        die("CSRF validation failed.");
    }

    $newpass = $_POST['newpass'];

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = 'admin'");
    $stmt->bind_param("s", $newpass);
    $stmt->execute();
    $stmt->close();

    echo "Password changed to: " . htmlspecialchars($newpass);
}
?>

<h2>Change Password (With CSRF Token)</h2>
<form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
    New Password: <input type="text" name="newpass">
    <button type="submit">Change</button>
</form>