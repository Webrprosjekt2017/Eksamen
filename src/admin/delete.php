<?php
session_start();
require_once('../includes/config.php');
require_once('../includes/ExploreDatabase.php');
$db = new ExploreDatabase();

if (isset($_POST['delete'])) {
    $db->removeLocation($_POST['delete']);
    $_SESSION['success'] = true;
}

header("Location: remove-location.php");
?>