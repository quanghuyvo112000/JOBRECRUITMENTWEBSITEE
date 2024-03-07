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

    $sql = "SELECT * FROM user_form UF
    INNER JOIN dangtuyen_form DT ON UF.id_user  = DT.id_user 
    INNER JOIN  bookmark BM ON DT.id_post = BM.id_post" ;

    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc())
    {
        $data[] = $row;
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
    <title>Bookmark</title>
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
                    <a class="nav-link" href="../create_cv/create_cv.php">Tạo CV</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['user_name']; ?> </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="../create_cv/quanlytk.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="#">Bookmark</a> </div> </li> 
                <li class="nav-item"><a class="nav-link" href="../app/dangxuat.php" ><button class="btn btn-danger">Đăng xuất</button></a></li>                
            </ul>
        </div>
      </div>
    </nav>
    <!-- End navbar -->
    <div class="container"  style="margin-top: 85px;  min-height: 570px;">
        <div class="card">
                <div class="row">
                    <?php 
                        foreach($data as $row){
                            if($row['id_user'] == $id){
                                echo"
                                    <div class=\"col-12 col-md-6 col-lg-4 col-xl-4\">
                                        <div style=\"height: 450px\" class=\"mb-3 mb-3-list\">
                                            <a href=\"../job/chitiet.php?id=$row[id_post]\" style=\"text-decoration: none; color: black\" target=\"_blank\">
                                                <ul>
                                                    <li class=\"lists_cv\"><img style=\"margin-right: 10px\" src=\"../dangtuyen/$row[img]\" alt=\"\"><h4>$row[name_company]</h4></li>
                                                    <hr>
                                                    <li class=\"lists_cv\">Khu vực <span class=\"list_cv\">$row[area]</span></li><br>
                                                    <li class=\"lists_cv\">Tuyển vị trí <span class=\"list_cv\">$row[job]</span></li><br>
                                                    <li class=\"lists_cv\">Kỹ năng <span class=\"list_cv\" style=\"text-transform: uppercase;\"> $row[skills]</span></li><br>
                                                    <li class=\"lists_cv\">Cấp bật tuyển dụng <span class=\"list_cv\">$row[rank]</span></li><br>
                                                    <li class=\"lists_cv\">Lương <span class=\"list_cv\">$row[salary]</span> </li><br>
                                                    <a href=\"../job/xoa_bookmark.php?id=$row[id_bookmark]\"><button class=\"btn btn-danger\"> Xoá</button></a>
                                                </ul>
                                                </a>
                                                </div>
                                    </div>           
                                ";
                            }
                        }
                    ?>
                </div>
            <div class="msg-not-find text-muted" style="display: <?php if (count($data) == 0) echo "block"; else echo "none"; ?>">
                <span>Không tìm thấy kết quả phù hợp</span>
                <a href="../index.php">&#8227; Trở lại</a>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><strong>Copyright</strong> &copy; Our Website 2022 <br><span style="font-size: 12px;"> by 51800287 - 52000786 - 52100920</span></p>
      </div>
    </footer>
</body>
</html>