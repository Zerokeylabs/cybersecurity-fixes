<?php
session_start();
if (!isset($_SESSION['fails'])) $_SESSION['fails'] = 0;
if ($_SESSION['fails'] > 5) die('Blocked');
?>