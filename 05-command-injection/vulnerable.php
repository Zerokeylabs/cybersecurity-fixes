<?php
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    $cmd = "ping -n 2 " . $ip;  // Windows version
    echo "<pre>" . shell_exec($cmd) . "</pre>";
}
?>

<form method="GET">
    <label>Enter IP:</label>
    <input type="text" name="ip">
    <input type="submit" value="Ping">
</form>