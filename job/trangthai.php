<?php
    include_once('../sql/dhb.php');
    session_start();
    
    $_SESSION['user_id'];

    if(!isset($_SESSION['user_id'])){
        header('location: ../app/dangnhap.php');
    }
        
    $_SESSION['user_name'];
    $user_name = $_SESSION['user_name'];

    $id = $_GET['id'];


    if(isset($_POST["submit"])) {
        if(isset($_POST['status'])){
            $status = $_POST['status'];
            mysqli_query($conn,"UPDATE `quanlyfile_cv` SET `status`='$status' WHERE `id_file`='$id' ")  or die('query failed');
        }
        header('location: ../job/file_cv.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Cập nhật trạng thái CV</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../home/index_employer.php">Trang chủ</a>
                    <a class="nav-link" href="../dangtuyen/dangtuyen.php">Đăng tuyển</a>
                    <a class="nav-link" href="../dangtuyen/quanly.php">Quản lý bài đăng</a>
                    <a class="nav-link link_style" href="../job/file_cv.php">Quản lý file CV</a>
                    <div class="infor">
                        <div class="nav-link"><?php echo $user_name; ?></div>
                        <a class="nav-link logout" href="../app/dangxuat.php" >Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- End navbar -->
    <div class="container">
        <div class="card">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Trạng thái CV</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="ĐÃ XEM">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Đã xem
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="ĐÃ XEM CHỜ LIÊN HỆ PHỎNG VẤN">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Đã xem chờ liên hệ
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Cập Nhật Trạng Thái" name="submit" class="btn btn-primary" style="width: 100%">
                </div>
            </form>
        </div>
    </div>
</body>
</html>