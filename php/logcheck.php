<?php
session_start();
include 'db.php';
if (!empty($_POST)) {
    $login=$_POST['login'];
    $email=$_POST['email'];
    $query="SELECT * FROM `users` WHERE `login`='$login' or `email`='$email'";
    $result=$link->query($query);
    if($result->num_rows>0){
        $message="Пользователь с таким Логином или Email существует";
        $response=['status'=>'error','message'=>$message];
    }
    else
    $response=['status'=>'ok'];
    echo json_encode($response);
}
?>