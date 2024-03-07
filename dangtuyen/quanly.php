<?php 
    include_once('../sql/dhb.php');
    session_start();
    
    $_SESSION['user_name'];
    $user_name = $_SESSION['user_name'];

    $_SESSION['user_id'];
    $id = $_SESSION['user_id'];

    if(!isset($_SESSION['user_id'])){
        header('location: ../app/dangnhap.php');
    }
    $sql = "SELECT * FROM `user_form` WHERE `id_user` = '$id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    $sql = "SELECT * FROM dangtuyen_form WHERE `id_user` = '$id'";
    $result = $conn->query($sql);
    
    $mess = '';
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form-style.css">
    <link rel="stylesheet" href="../css/account.css">
    <title>Quản lý bài đăng</title>
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
                    <a class="nav-link" href="#">Đăng tuyển</a>
                </li>
                
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['user_name']; ?> </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="../dangtuyen/quanly.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="../job/file_cv.php">Danh sách CV</a> </div> </li>
                <li class="nav-item"><a class="nav-link" href="../app/dangxuat.php" ><button class="btn btn-danger">Đăng xuất</button></a></li>
                
                
                <!-- /. dropdown -->
                
            </ul>
        </div>
      </div>
    </nav>
    <!-- End navbar -->
    <div class="container div" style="margin-top: 100px;">
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
                        <a href="#" data-tabs-id="account-info" class="list-group-item <?php if($paserr == 0 && !isset($_GET['quanly'])) echo "active"; ?>">Thông tin tài khoản</a>
                        <a href="#" data-tabs-id="managerPost" class="list-group-item <?php if (isset($_GET['quanly'])) echo "active"; ?>">Quản lý bài đăng</a>
                        <a href="#" data-tabs-id="changepwd" class="list-group-item <?php if($paserr != 0) echo "active"; ?>">Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
            <!-- /.col left -->
            <div class="col-12 col-lg-9" id="div-right">
                <div class="boxinfo account-info <?php if($paserr == 0 && !isset($_GET['quanly'])) echo "active"; ?>">
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
                <div class="boxinfo managerPost  <?php if (isset($_GET['quanly'])) echo "active"; ?>">
                    <h3 class="title">Quản lý bài đăng tuyển dụng</h3>
                    <?php
                        foreach($data as $row){
                                echo "
                                    <div class=\"container\">
                                        <div class=\"col-12\">
                                            <div class=\"card\">
                                                <div class=\"content\" style=\"height: 100%; \">
                                                    <div class=\"mb-3\" style=\"background-color: #fafef9; \">
                                                        <div class=\"cpn-infor\"  style=\"width: 100%;\">
                                                        <div class=\"list-row\"  style=\"width: 100%;\">
                                                            <div class=\"list-col\"  style=\"width: 100%;\">
                                                            <h1 style=\"text-transform: uppercase;\">$row[name_company]</h1>
                                                            <p>$row[slogan]</p>
                                                            </div>
                                                            <div style=\"width:200px\" class=\"img-box\" href=\"#\" title=\"Follow the link\">
                                                                <img style=\"width:100%\"  class=\"img-logo\" src=\"$row[img]\">
                                                            </div >
                                                        </div>
                                                        <div class=\"cpn-foot\">
                                                            <div class=\"hide-ellip\">
                                                                <span title=\"\">Địa chỉ $row[address]</span>
                                                            </div>
                                                        </div>
                                                        <!-- end cpn-foot -->
                                                        </div>
                                                    </div>
                                                <!-- end cpn-infor -->
                                                <h4 style=\"margin-left: 25px\"> 
                                                    <span style=\"margin-left: 45px\" class=\"ctt-pst\">
                                                        <strong><i> $row[job]</i></strong>
                                                    </span>
                                                </h4>
                                                <div class=\"mb-3\" style=\"background-color: #fafef9; width: 100%;\">
                                                    <div class=\"list-row list-spabet\" style=\"width: 100%;\">
                                                        <div class=\"list-col\" style=\"padding-right: 5px;\">
                                                        <h2 class=\"ctt-title\">Trách nhiệm công việc</h2>
                                                        <div class=\"ptt-describe\">
                                                            <ul>
                                                                <li>$row[description]</li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <h2 class=\"ctt-title\">Kỹ năng & Chuyên môn</h2>
                                                        <div class=\"ptt-describe\">
                                                            <ul>
                                                                <li>$row[job_detail] <br></li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <!-- end ptt-describe -->
                                                        <!-- end span -->
                                                        </div>
                                                        <!-- end list-col -->
                                                        <div class=\"list-col poster-info col-spabet\">
                                                            <h3>Khu vực</h3>
                                                            <span>$row[area]</span>
                                                            <h3>Cấp bậc tuyển dụng</h3>
                                                            <span>$row[rank]</span>
                                                            <h3>Số năm kinh nghiệm</h3>
                                                            <span>$row[exp_number] năm</span>
                                                            <h3>Kỹ năng</h3>
                                                            <span style=\"text-transform: uppercase;\">$row[skills]</span>
                                                            <h3>Quy trình phỏng vấn</h3>
                                                            <span>$row[interview] vòng phỏng vấn</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <!-- end intro -->
                                                </div>
                                                <!-- end content -->
                                            </div>
                                            <div class=\"mb-3\" style=\"display: grid;\">
                                                <a class=\"btn btn-primary btn-sm\" href=\"./sua.php?id=$row[id_post]\">Sửa</a><br>
                                                <a class=\"btn btn-danger btn-sm\" href=\"./xoa.php?id=$row[id_post]\">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                ";
                        }
                    ?>
                    <div class="msg-not-find text-muted" style="display: <?php if (count($data) == 0) echo "block"; else echo "none"; ?>">
                    <span>Không tìm thấy bài đăng tuyển dụng nào</span>
                        <a href="../index.php">&#8227; Về trang chủ</a>
                    </div>
                    <br>
                    <a href="../dangtuyen/dangtuyen.php">
                        <button class="btn btn-success" style="width: 100%">Đăng tuyển</button>
                    </a>
                </div>
                <!-- /. Manager Post -->
                <div class="boxinfo changepwd <?php if($paserr != 0) echo "active"; ?>">
                    <h3 class="title">Đổi mật khẩu</h3>
                    <form action="./quanly.php" method="POST" id="loggin-form">
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