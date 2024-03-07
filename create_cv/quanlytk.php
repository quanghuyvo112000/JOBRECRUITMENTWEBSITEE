<?php 
    include_once('../sql/dhb.php');
    session_start();

    $_SESSION['user_id'];
    $id = $_SESSION['user_id'];

    if(!isset($_SESSION['user_id'])){
        header('location: ../app/dangnhap.php');
    }
    $sql = "SELECT * FROM `user_form` WHERE `id_user` = '$id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
        
    $_SESSION['user_name'];
    $user_name = $_SESSION['user_name']; 

    // $sql = "SELECT * FROM user_form
    // INNER JOIN quanlyfile_cv
    // ON user_form.id_user = quanlyfile_cv.id_users";

    $sql = "SELECT * FROM user_form UF
    INNER JOIN dangtuyen_form DT ON UF.id_user  = DT.id_user 
    INNER JOIN  quanlyfile_cv QL ON DT.id_post = QL.id_post" ;

    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }

    $paserr = 0;
    if (isset($_POST['submit-change'])){
        $sql = "SELECT `password` FROM `user_form` WHERE `id_user` = '$id'";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        $password = mysqli_real_escape_string($conn, md5($_POST['oldpassword']));
        if ($password != $result['password']){
            $paserr = 1;
            $msgerr = "Mật khẩu cũ không hợp lệ";
        }else{
            if (strlen($_POST['newpassword']) < 6){
                $paserr = 2;
                $msgerr = "<br>Mật khẩu mới không hợp lệ";
            }else{
                $npassword = mysqli_real_escape_string($conn, md5($_POST['newpassword']));
                if ($npassword == $password){
                    $paserr = 2;
                    $msgerr = "<br>Mật khẩu mới không được trùng với mật khẩu cũ";
                }else{
                    if ($_POST['newpassword'] != $_POST['confpassword']){
                        $paserr = 3;
                        $msgerr = "Xác nhận mật khẩu mới không khớp nhau";
                    }else{
                        $sql = "UPDATE `user_form` SET `password` = '$npassword' WHERE `id_user` = '$id'";
                        $result = $conn->query($sql);
                        echo "<script>alert('Thay đổi Mật khẩu thành công!');location.href = '../app/dangxuat.php';</script>";
                    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form-style.css">
    <link rel="stylesheet" href="../css/account.css">
    <title>Quản lý tài khoản</title>
</head>
<body>
    <!-- Navbar -->
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
                    <a class="nav-link" href="./create_cv.php">Tạo CV</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['user_name']; ?> </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="./quanlytk.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="../job/bookmark.php">Bookmark</a> </div> </li> 
                <li class="nav-item"><a class="nav-link" href="../app/dangxuat.php" ><button class="btn btn-danger">Đăng xuất</button></a></li>                
            </ul>
        </div>
      </div>
    </nav>
    <!-- End navbar -->

    <div class="container div">
        <div class="row">
            <div class="col-lg-3">
                <div style="padding: 15px 0 20px;" class="box-info">
                    <div class="info-box">
                        <span>
                            <?php
                                echo $user['name'];
                            ?>
                        </span>
                    </div>
                    <!-- /.info box -->
                    <div class="list-group">
                        <a href="#" data-tabs-id="account-info" class="list-group-item <?php if($paserr == 0) echo "active"; ?>">Thông tin tài khoản</a>
                        <a href="#" data-tabs-id="managerPost" class="list-group-item">Quản lý CV</a>
                        <a href="#" data-tabs-id="changepwd" class="list-group-item <?php if($paserr != 0) echo "active"; ?>">Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
            <!-- /.col left -->
            <div class="col-12 col-lg-9" id="div-right">
                <div class="boxinfo account-info <?php if($paserr == 0) echo "active"; ?>">
                    <h3 class="title">Thông tin tài khoản</h3>
                    <div>
                        <table class="accinfo">
                            <tr>
                                <td>Tên tổ chức:</td>
                                <td><?php echo $user['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Loại tài khoản:</td>
                                <td><?php if ($user['user_type'] == '0') echo "Người dùng"; else echo "Nhà tuyển dụng"; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /. boxinfo -->
                <div class="boxinfo managerPost">
                    <h3 class="title">Quản lý CV đã nộp</h3>
                    <div class="card">
                        <div class="mb-3">
                            <?php 
                                foreach($data as $row){
                                    if($row['id_users'] == $id){
                                        $has = true;
                                        echo "
                                                <div class=\"card\" style=\"padding: 15px\">
                                                    <div> File CV của bạn nộp tại công ty $row[name_company] - Ở trạng thái <span style='color: red;'> $row[status] <span> </div><br>
                                                </div>
                                        ";
                                    }
                                }
                            ?>
                            <div class="msg-not-find text-muted" style="display: <?php if (!isset($has)) echo "block"; else echo "none"; ?>">
                                <span>Không tìm thấy bất kỳ file CV đã nộp</span>
                                <a href="../index.php">&#8227; Về trang chủ</a>
                            </div>
                        </div>
                    </div>
                    <!-- /. card -->
                </div>
                <!-- /. Manager Post -->
                <div class="boxinfo changepwd <?php if($paserr != 0) echo "active"; ?>">
                    <h3 class="title">Đổi mật khẩu</h3>
                    <form action="./quanlytk.php" method="POST" id="loggin-form">
                        <table class="accinfo">
                            <tr>
                                <td><label for="email">Email:</label></td>
                                <td><strong><?php echo $user['email']; ?></strong></td>
                            </tr>
                            <tr>
                                <td><label for="oldpassword">Mật khẩu hiện tại:</label></td>
                                <td><input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Nhập mật khẩu hiện tại"><span class="text-error"><?php if ($paserr == 1) echo $msgerr; ?></span></td>
                            </tr>
                            <tr>
                                <td><label for="newpassword">Mật khẩu mới:</label></td>
                                <td><input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Nhập mật khẩu mới"><span class="note text-muted">*Mật khẩu bắt buộc phải có ít nhất 6 ký tự</span><span class="text-error"><?php if ($paserr == 2) echo $msgerr; ?></span></td>
                            </tr>
                            <tr>
                                <td><label for="confpassword">Xác nhận Mật khẩu mới:</label></td>
                                <td><input type="password" class="form-control" name="confpassword" id="confpassword" placeholder="Nhập lại mật khẩu mới"><span class="text-error"><?php if ($paserr == 3) echo $msgerr; ?></span></td>
                            </tr>
                        </table>
                        <div class="btn-submit">
                            <button type="submit" name="submit-change" class="btn btn-success">Thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- col right -->
        </div>
        <!-- /.row -->
    </div>


    
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><strong>Copyright</strong> &copy; Our Website 2022 <br><span style="font-size: 12px;"> by 51800287 - 52000786 - 52100920</span></p>
      </div>
    </footer>
    <script src="../js/account-tabs.js"></script>
</body>
</html>


        