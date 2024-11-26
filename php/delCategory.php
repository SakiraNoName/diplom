<?php
include 'db.php';
$category=$_POST['category'];
$query="DELETE FROM `category` WHERE `id`= '$category'";
$link->query($query);
header("Location: ../admin.php")
?>