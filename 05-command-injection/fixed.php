<?php
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        $cmd = "ping -n 2 " . escapeshellarg($ip);
        echo "<pre>" . shell_exec($cmd) . "</pre>";
    } else {
        echo "Invalid IP!";
    }
}
?>

<form method="GET">
    <label>Enter IP:</label>
    <input type="text" name="ip">
    <input type="submit" value="Ping">
</form>