<?php 
    include_once('../sql/dhb.php');
    session_start();

    $_SESSION['user_id'];

    $user_id = $_SESSION['user_id'];

    if(!isset($_SESSION['user_id'])){
        header('location: ../app/dangnhap.php');
    }
    
    $_SESSION['user_name'];
    $user_name = $_SESSION['user_name'];

    $id_bookmark = $_GET['id'];

    echo $id_bookmark;

    if(isset($id_bookmark)){
        $insert = mysqli_query($conn, "INSERT INTO `bookmark` (id_post, id_user) VALUES
        ('$id_bookmark', '$user_id ')") or die('query failed');
    }

    header('location: ../job/job.php');
?>