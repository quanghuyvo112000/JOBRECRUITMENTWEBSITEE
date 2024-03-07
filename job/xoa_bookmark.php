<?php 
    include_once('../sql/dhb.php');
    session_start();

    $_SESSION['user_id'];
    $id = $_SESSION['user_id'];
    
    if(!isset($_SESSION['user_id'])){
        header('location: ../app/dangnhap.php');
    }

    $_SESSION['user_name'];
    $user_name = $_SESSION['user_name'];

    $id = $_GET['id'];

    $sql = "DELETE FROM `bookmark` WHERE `id_bookmark` = $id";
    $result = $conn->query($sql);

    header('location: ../job/bookmark.php');


?>