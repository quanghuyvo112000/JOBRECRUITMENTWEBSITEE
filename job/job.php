<?php 
    include_once('../sql/dhb.php');
    session_start();
    if (!isset($_GET['page'])) {
        unset($_SESSION['sql']);
    }
    $sql = isset($_SESSION['sql'])?$_SESSION['sql']:"SELECT * FROM `dangtuyen_form`";
    
    if (isset($_POST['key']) || isset($_POST['cid'])){
        $key = $_POST['key'];
        $cid = $_POST['cid'];
        if ($cid != 'All' || $key != ''){
          $sql = "SELECT * FROM `dangtuyen_form` WHERE true";
          if ($cid == 'Hồ Chí Minh')
            $sql = $sql." and (`area` like '%$cid%' or `area` like '%HCM%' or `address` like '%$cid%' or `address` like '%HCM%')";
          else if ($cid == 'Hà Nội'){
            $sql = $sql." and (`area` like '%$cid%' or `area` like '%Hanoi%' or `address` like '%$cid%' or `address` like '%Hanoi%')";
          }
          else if ($cid != 'All') $sql = $sql." and (`area` like '%$cid%' or `address` like '%$cid%')";
          if ($key != ''){
            $sql = $sql." and (`name_company` like '%$key%' or `slogan` like '%$key%' or `email` = '$key' or `area` like '%$key%' or `address` like '%$key%' or `job` like '%$key%' or `skills` like '%$key%' or `job_detail` like '%$key%' or `exp_number` like '%$key%' or `type_job` like '%$key%'  or `salary` like '%$key%')";
          }
        }
        $_SESSION['sql'] = $sql;
    }
    $result = $conn->query($sql);
    $totalPages = mysqli_num_rows($result);
    // phân trang
    $items_page = 6;
    $current_page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($current_page - 1) * $items_page;
    $totalPages = ceil($totalPages / $items_page);


    $sql = $sql." ORDER BY `id_post` DESC LIMIT $items_page OFFSET $offset";
    // hết phân trang

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Tìm kiếm việc làm</title>
</head>
<body>
    <!-- Navbar -->
    <!-- Navigation -->
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
                            <a class="nav-link active" href="#">Tìm việc</a>
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
                                    <a class="nav-link active" href="#">Tìm việc</a>
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
                            echo '<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$_SESSION['user_name'].' </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="../create_cv/quanlytk.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="bookmark.php">Bookmark</a> </div> </li>';
                        }else{
                            echo '<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$_SESSION['user_name'].' </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="../dangtuyen/quanly.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="file_cv.php">Danh sách CV</a> </div> </li>';
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
    <br>
    <div class="container" style="margin-top: 55px; min-height: 570px;">
        <div class="row">
            <?php 
                foreach($data as $row){
                    $st = ($row['salary']=='Mức lương') ? 'Thoả thuận' : $row['salary'];
                    echo"
                        <div class=\"col-12 col-md-6 col-lg-4 col-xl-4\">
                            <div style=\"height: 450px\" class=\"mb-3 mb-3-list\">
                                <a href=\"../job/chitiet.php?id=$row[id_post]\" style=\"text-decoration: none; color: black\" target=\"_blank\">
                                    <ul>
                                        <li class=\"lists_cv\">
                                            <div class='list-row'>
                                                <div class='img-box'>
                                                    <img class=\"img-logo\" style=\"margin-right: 10px\" src=\"../dangtuyen/$row[img]\" alt=\"\">
                                                </div>
                                                <div class='hide-ellip'><h4>$row[name_company]</h4></div>
                                            </div>
                                        </li>
                                        <hr>
                                        <li class=\"lists_cv\">Khu vực <span class=\"list_cv\">$row[area]</span></li><br>
                                        <li class=\"lists_cv\">Tuyển vị trí <span class=\"list_cv\">$row[job]</span></li><br>
                                        <li class=\"lists_cv\">Kỹ năng <span class=\"list_cv\" style=\"text-transform: uppercase;\"> $row[skills]</span></li><br>
                                        <li class=\"lists_cv\">Cấp bậc tuyển dụng <span class=\"list_cv\">$row[rank]</span></li><br>
                                        <li class=\"lists_cv\">Lương <span class=\"list_cv\">".$st."</span> </li><br>
                                    </ul>
                                </a>
                            </div>
                        </div>              
                    
                    ";
                }
            ?>
        </div>
        <!-- Phân trang -->
       <style>
        
       </style>
            
        <nav aria-label="Page navigation example"  style='display: flex; margin: auto;margin-bottom: 15px;'>
            <ul class="pagination"  style='display: flex; margin: auto'>
                <?php
                    for ($i = 1; $i <= $totalPages; $i++){
                        $result = "";
                        if ($i == $current_page)
                            $result = " act disabled";
                        echo "<li class=\"page-item$result\"><a class=\"page-link\" href=\"?page=$i\">$i</a></li>";
                    }
                ?>
                <li class="page-item<?php if ($current_page == $totalPages) echo " disabled"; ?>" title="Next"><a class="page-link" href="?page=<?php if ($current_page < $totalPages) echo $current_page + 1; ?>">&#8227;</a></li>
            </ul>
        </nav>

        <!-- hết phân trang -->
        <div class="msg-not-find text-muted" style="display: <?php if (count($data) == 0) echo "block"; else echo "none"; ?>">
            <span>Không tìm thấy kết quả phù hợp</span>
            <a href="../index.php">&#8227; Trở lại</a>
        </div>
    </div>

    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><strong>Copyright</strong> &copy; Our Website 2022 <br><span style="font-size: 12px;"> by 51800287 - 52000786 - 52100920</span></p>
      </div>
    </footer>
</body>
</html>