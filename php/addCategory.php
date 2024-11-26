<?php
include 'db.php';
$category=$_POST['category'];
$query="INSERT INTO `category`(`name`) VALUES ('$category')";
$link->query($query);
header("Location: ../admin.php")

?>