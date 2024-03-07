<?php 
    include_once('../sql/dhb.php');
    session_start();

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND
        password = '$pass'") or die('query failed');
        if(mysqli_num_rows($select) > 0 ){
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];
            
            header('location: ../index.php');
            
        }
        else{
            $message[] = 'Kiểm tra lại thông tin!';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form-style.css">
    <title>Đăng Nhập</title>
</head>
<body style="background-color: #f4fef8;">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.php"><strong>JOB</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-spabet" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../job/job.php">Tìm việc</a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đăng tuyển</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tạo CV</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#" ><button class="btn btn-success">Đăng nhập</button></a></li>
                <li class="nav-item"><a class="nav-link" href="dangky.php" ><button class="btn btn-danger">Đăng ký</button></a></li>
                <!-- /. dropdown -->
            </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="margin-top: 55px;">
        <div class="row">
            <div class="col-lg-6 col-xl-6 inner" style="text-align: center;">
                <img src="../img/support.webp" alt="" style="width:100%; margin: 25px 0;">
                <h4>Hỗ trợ Người tìm việc</h4>
                <p>Nhà tuyển dụng chủ động tìm kiếm và liên hệ với bạn qua hệ thống kết nối ứng viên thông minh.</p>
            </div>
            <div class="col-12 col-lg-6 col-xl-6" style="margin: auto;">
                <form action="dangnhap.php" method="post" id="loggin-form">
                    <h4 class="title">Đăng Nhập Tài Khoản</h4>
                    <div class="card" style="background-color: rgb(248, 248, 248); border-radius: 2px;">
                        <div class="mb-2" style="margin: 10px 5px;">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-2" style="margin: 10px 5px;">
                            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <span>
                        <?php 
                            if(isset($message)){
                                foreach($message as $message){
                                    echo '<div class="message">'.$message.'</div>';
                                }
                            }
                        ?>
                        </span>
                        <div class="mb-3" style="padding: 0;margin: 10px 5px;">
                            <input type="submit" name="submit" value="Đăng Nhập" class="btn btn-primary" style="width: 100%;">
                        </div>
        
                        <div class="mb-3" style="text-align: center; padding: 10px;">
                            <span class="text-muted">
                                Chưa có tài khoản? 
                            </span>
                            <a href="../app/dangky.php" style="margin-left: 5px;">
                                Đăng Ký
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>