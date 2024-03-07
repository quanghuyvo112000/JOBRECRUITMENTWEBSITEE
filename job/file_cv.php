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
    INNER JOIN  quanlyfile_cv QL ON DT.id_post = QL.id_post" ;
    $result = $conn->query($sql);
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
    <title>Quản lý file CV</title>
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
                    <a class="nav-link" href="../dangtuyen/dangtuyen.php">Đăng tuyển</a>
                </li>'
                
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

    <div class="container" style="margin-top: 85px; min-height: 560px;">
        <div class="card">
            <div class="mb-3">
                <?php 
                    while ($row = $result->fetch_assoc()){
                        if($row['id_user'] == $id){
                            $cvlist = true;
                            echo "
                                    <div class=\"card\" style=\"padding: 15px\">
                                        <a style='text-decoration: none' href=\"$row[file]\"> File CV của bạn $row[name] gửi lên.</a> - <div> Với trạng <span style='color: red;'>$row[status]</span></div><br>
                                        <a style='text-decoration: none' href=\"../job/trangthai.php?id=$row[id_file]\"><button class=\"btn btn-primary\">Cập nhật trạng thái</button></a>
                                    </div>
                            ";
                        }
                    }
                ?>
                <div class="msg-not-find text-muted" style="display: <?php if (!isset($cvlist)) echo "block"; else echo "none"; ?>">
                    <span>Không tìm thấy thí sinh nào đã nộp CV</span>
                    <a href="../index.php">&#8227; Trở lại</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><strong>Copyright</strong> &copy; Our Website 2022 <br><span style="font-size: 12px;"> by 51800287 - 52000786 - 52100920</span></p>
      </div>
    </footer>
</body>
</html>