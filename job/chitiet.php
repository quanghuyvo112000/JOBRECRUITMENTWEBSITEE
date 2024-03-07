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

    $_SESSION['id_post'] = $id;

    $sql = "SELECT * FROM dangtuyen_form WHERE id_post = $id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Chi tiết công việc</title>
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
                <?php
                    if(!isset($_SESSION['user_id'])){
                        echo
                        '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="job.php">Tìm việc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../dangtuyen/dangtuyen.php">Đăng tuyển</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../create_cv/create_cv.php">Tạo CV</a>
                        </li>';
                    }else{
                        echo '<li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../index.php">Trang chủ</a>
                            </li>';
                        if ($_SESSION['user_type'] == '0')
                            echo
                                '<li class="nav-item">
                                    <a class="nav-link active" href="./job.php">Tìm việc</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../create_cv/create_cv.php">Tạo CV</a>
                                </li>';
                        else
                            echo 
                            '<li class="nav-item">
                                <a class="nav-link" href="../dangtuyen/dangtuyen.php">Đăng tuyển</a>
                            </li>';
                    }
                ?>
                
            </ul>
            <ul class="navbar-nav">
                <?php
                    if(!isset($_SESSION['user_id'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="../app/dangnhap.php" ><button class="btn btn-success">Đăng nhập</button></a></li>
                              <li class="nav-item"><a class="nav-link" href="../app/dangky.php" ><button class="btn btn-danger">Đăng ký</button></a></li>';
                    }else{
                        if ($_SESSION['user_type'] == '0'){
                            echo '<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$_SESSION['user_name'].' </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="../create_cv/quanlytk.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="./bookmark.php">Bookmark</a> </div> </li>';
                        }else{
                            echo '<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$_SESSION['user_name'].' </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="../dangtuyen/quanly.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="./file_cv.php">Danh sách CV</a> </div> </li>';
                        }
                        echo '<li class="nav-item"><a class="nav-link" href="../app/dangxuat.php" ><button class="btn btn-danger">Đăng xuất</button></a></li>';
                    }
                ?>
                
                <!-- /. dropdown -->
                
            </ul>
        </div>
      </div>
    </nav>
    <!-- End navbar -->

    <div class="container" style="margin-top: 85px;">
    <?php 
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
                                            <div class=\"img-box\" href=\"#\" title=\"Follow the link\">
                                                <img class=\"img-logo\" src=\"../dangtuyen/$row[img]\">
                                            </div >
                                            <a href=\"../job/save_bookmark.php?id=$id\"><span class='bookmark' style='margin: 0 15px;'><i class=\"far fa-bookmark fa-2x\"></i></span></a>
                                        </div>
                                        <div class=\"cpn-foot\">
                                            <div class=\"hide-ellip\">
                                                <span title=\"\">Địa chỉ $row[address]</span>
                                            </div>
                                            <a href=\"mailto:$row[email]\" title=\"Send mail to: $row[email]\">
                                                <div class=\"img-box\">
                                                    <div>
                                                        <img class=\"img-logo\" src=\"../img/icons-sendmail.png\">
                                                    </div>
                                                </div>
                                            </a>
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
                                    <div class=\"list-row\" style=\"width: 100%;\">
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
                                        <div class=\"list-col poster-info\">
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
                            <p>
                                <button style=\"width:100%; \" class=\"btn btn-success\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseWidthExample\" aria-expanded=\"false\" aria-controls=\"collapseWidthExample\">
                                    Gửi CV
                                </button>
                                </p>
                                <div style=\"min-height: 120px;\">
                                <div class=\"collapse collapse-horizontal\" id=\"collapseWidthExample\">
                                    <div class=\"card card-body\">
                                        <form action=\"nopcv.php\" method=\"post\" enctype=\"multipart/form-data\">
                                            <div class=\"mb-3\">
                                                <b>Chọn CV muốn nộp</b>
                                                <br>
                                                <br>
                                                <div class=\"card\">
                                                    <input type=\"file\" name=\"fileUpload\" id=\"fileUpload\" accept=\".pdf\">
                                                </div>
                                                <br><br>
                                            </div>
                                            <div class=\"mb-3\">
                                                <input type=\"submit\" value=\"Nộp CV\" name=\"submit\" class=\"btn btn-success\" style=\"width: 100%\">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                    </div>
                
                ";

        ?>
    </div>
    
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><strong>Copyright</strong> &copy; Our Website 2022 <br><span style="font-size: 12px;"> by 51800287 - 52000786 - 52100920</span></p>
      </div>
    </footer>
</body>
</html>