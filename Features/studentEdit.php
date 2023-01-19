<?php
include("server.php");

if (empty($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
