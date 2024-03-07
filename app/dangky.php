<?php 

    include_once('../sql/dhb.php');

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $user_type =mysqli_real_escape_string($conn, $_POST['user_type']);
        if ($name == '' || $email == '' || $pass == '' || $cpass == ''){
            $message[] = 'Vui lòng điền đủ thông tin!';
        }
        if (strlen($_POST['password']) < 6){
            $message[] = 'Mật khẩu phải có ít nhất 6 ký tự!';
        }
        $select = $conn->query("SELECT * FROM `user_form` WHERE `email` = '$email'");

        if(mysqli_num_rows($select) > 0 && !isset($message)){
            $message[] = 'Địa chỉ email đã được đăng ký! Vui lòng sử dụng một email khác!';
        }
        else{
            if($pass != $cpass){
                $message[] = 'Vui lòng kiểm tra lại mật khẩu!';
            }else{
                if (!isset($message)){
                    $insert = mysqli_query($conn, "INSERT INTO `user_form` (name, email, password, user_type) VALUES
                    ('$name', '$email', '$pass', '$user_type')") or die('query failed');
                    if($insert){
                        // $message[]= 'Đăng ký tài khoản thành công!';
                        // header('location: dangnhap.php');
                        echo "<script>
                                alert('Đăng ký tài khoản thành công!');
                                location.href = 'dangnhap.php';
                             </script>";
                    }else{
                        $message[]= 'Đăng ký tài khoản không thành công!';
                    }
                }else{
                    $message[]= 'Đăng ký tài khoản không thành công!';
                }
            }
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
    <title>Đăng Ký</title>
</head>
<body>
    <!-- Navigation -->
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
                    <a class="nav-link" href="../dangtuyen/dangtuyen.php">Đăng tuyển</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../create_cv/create_cv.php">Tạo CV</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="dangnhap.php" ><button class="btn btn-success">Đăng nhập</button></a></li>
                <li class="nav-item"><a class="nav-link" href="#" ><button class="btn btn-danger">Đăng ký</button></a></li>
                <!-- /. dropdown -->
            </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="margin-top: 65px;">
        <div class="row">
            <div class="col-xl-6 inner">
                <img src="../img/pic-job1.png" style="width:100%; margin: 77px 0 0;">
            </div>
            <!-- /. col-lg-6 -->
            <div class="col-xl-6 col-12 inner"  style="margin: auto;">
                <div>
                    <form action="dangky.php" method="post" id="register-form">
                        <h4 class="title">Đăng Ký Tài Khoản</h4>
                        <div class="card">
                            <div class="mb-3" style="border-top-left-radius: 5px;border-top-right-radius: 5px;">
                                <label for="formGroupExampleInput" class="form-label">Họ và Tên</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Mật khẩu</label>
                                <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Nhập lại mật khẩu</label>
                                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword2" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="user_type" class="form-label" style="margin-right: 25px;">
                                    Bạn là
                                </label>
                                <select name="user_type" class= "user_type" id="user_type" style="padding: 6px; width: 100%;">
                                    <option value="0">Ứng viên tìm việc làm</option>
                                    <option value="1">Nhà tuyển dụng</option>
                                </select>
                            </div>
                            <div class="mb-3" style="padding: 0 25px;height: 50px;">
                                <?php 
                                        if(isset($message)){
                                            foreach($message as $message){
                                                echo '<div class="message"><i>'.$message.'</i></div>';
                                            }
                                        }
                                ?>
                            </div>
                            <div class="mb-3 form_btn">
                                <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary" style="border-top-left-radius: 0;border-top-right-radius: 0;">
                            </div>
                            <div class="mb-3x form_btn" style="text-align: center; padding: 10px;">
                                <br>
                                <span>
                                    <span class="text-muted" >
                                        Đã có tài khoản?
                                    </span>
                                    <a href="dangnhap.php"  style="margin-left: 5px;">
                                        Đăng Nhập
                                    </a>
                                    <span style="font-size: 12px;">
                                        <span class="text-muted" style="margin: 0 5px;">
                                            hoặc
                                        </span>
                                        <a href="../index.php" >
                                            Về trang chủ
                                        </a>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- /. inner-container -->
            </div>
            <!-- /. col-lg-6 -->
        </div>
    </div>
</body>
</html>