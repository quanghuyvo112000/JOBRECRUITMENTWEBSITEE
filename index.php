<?php
    session_start();
    require_once('./app/get_dangtuyen.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/homepage.css">
    <title>Trang chủ</title>
</head>
<body class="main">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><strong>JOB</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-spabet" id="navbarResponsive">
            <ul class="navbar-nav">
                <?php
                    if(!isset($_SESSION['user_id'])){
                        echo
                        '<li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./job/job.php">Tìm việc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dangtuyen/dangtuyen.php">Đăng tuyển</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./create_cv/create_cv.php">Tạo CV</a>
                        </li>';
                    }else{
                        echo '<li class="nav-item active">
                                <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                            </li>';
                        if ($_SESSION['user_type'] == '0')
                            echo
                                '<li class="nav-item">
                                    <a class="nav-link" href="./job/job.php">Tìm việc</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./create_cv/create_cv.php">Tạo CV</a>
                                </li>';
                        else
                            echo 
                            '<li class="nav-item">
                                <a class="nav-link" href="./dangtuyen/dangtuyen.php">Đăng tuyển</a>
                            </li>';
                    }
                ?>
                
            </ul>
            <ul class="navbar-nav">
                <?php
                    if(!isset($_SESSION['user_id'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="./app/dangnhap.php" ><button class="btn btn-success">Đăng nhập</button></a></li>
                              <li class="nav-item"><a class="nav-link" href="./app/dangky.php" ><button class="btn btn-danger">Đăng ký</button></a></li>';
                    }else{
                        if ($_SESSION['user_type'] == '0'){
                            echo '<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$_SESSION['user_name'].' </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="./create_cv/quanlytk.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="./job/bookmark.php">Bookmark</a> </div> </li>';
                        }else{
                            echo '<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" style="margin: 7px 0;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$_SESSION['user_name'].' </a> <div class="dropdown-menu" style="background-color: #f4fef8;" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="./dangtuyen/quanly.php">Quản lý tài khoản</a> <div class="dropdown-divider"></div> <a class="dropdown-item" href="./job/file_cv.php">Danh sách CV</a> </div> </li>';
                        }
                        echo '<li class="nav-item"><a class="nav-link" href="./app/dangxuat.php" ><button class="btn btn-danger">Đăng xuất</button></a></li>';
                    }
                ?>
                
                <!-- /. dropdown -->
                
            </ul>
        </div>
      </div>
    </nav>


    <!-- Page Content -->
    <div class="container" style="min-height: 996px;">
      <div class='front-img-div'>
        <form action='./job/job.php' method='POST'>
          <input id='input' name='key' type="search" placeholder='Search'>
          <select name="cid" id="cid" class="local">
            <option value="All" title="Tất cả địa điểm">Tất cả địa điểm</option>
            <option value="Hồ Chí Minh" title="Hồ Chí Minh">Hồ Chí Minh</option>
            <option value="Hà Nội" title="Hà Nội">Hà Nội</option>
            <option value="Đà Nẵng" title="Đà Nẵng">Đà Nẵng</option>
          </select>
          <button id='search'>
            <img class="img-icons-s" src="./img/icons-s.png" alt="">
          </button>
        </form>
        
      </div>
      <!-- /.div -->
      <div class="row">

        <div class="col-lg-9">

        <div class="container-fluid">
          <h2>Nhà tuyển dụng nổi bật</h2>
          <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="5000">
              <div class="carousel-inner row w-100 mx-auto" role="listbox">
                  <?php
                    foreach($data as $key => $r){
                      if ($key == 0)
                        $t = 'active';
                      else $t = '';
                      if ($r['img'] == null)
                        continue;
                      echo '<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 '.$t.'">
                                <img src="dangtuyen/'.$r['img'].'" class="img-fluid mx-auto d-block" alt="img'.$key.'">
                            </div>';
                    }
                  ?>

              </div>
              <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
      <!-- /.container-fluid -->

        </div>
        <!-- /.col-lg-9 -->
        <div class="col-lg-3">

          <h2>Tips</h2>
          <h6 class="card-subtitle text-muted">Mang yếu tố tham khảo</h6>
          <div class="list-group">
            <div class="tips" id="tip-1">
              <h4>For company</h4>
              <ul>
                <li>Đưa lợi ích "thực" vào bài viết</li>
                <li>Đặt title sống động, thực tế</li>
                <li>Sử dụng yếu tố hài hước, trendy nhưng không lạm dụng</li>
                <li>Bài viết không vòng vo; phải vào thẳng vấn đề, yêu cầu tuyển dụng</li>
                <li>Ghi rõ mô tả công việc, yêu cầu và vị trí cần tuyển</li>
                <li>Liệt kê quyền lợi, cơ hội thăng tiến có thể có đối với ứng viên</li>
              </ul>
            </div>
            <div class="tips" id="tip-2">
              <h4>For applicant</h4>
              <ul>
                <li>Tránh lỗi chính tả, nên kiểm tra thật kỹ trước khi nộp CV</li>
                <li>Chỉn chu trong câu từ</li>
                <li>Trình bày ngắn gọn, rõ ràng</li>
                <li>Nhất quán nội dung, cách trình bày</li>
                <li>Liệt kê kỹ năng, kinh nghiệm phù hợp vị trí ứng tuyển</li>
                <li>Thông tin "thực", không nói quá, phô trương về năng lực</li>
              </ul>
            </div>
            <div class="tips" id="tip-3">
              <h4>For candidate (interview)</h4>
              <ul>
                <li>Đến buổi phỏng vấn đúng giờ</li>
                <li>Trang phục nghiêm chỉnh, phù hợp</li>
                <li>Chuẩn bị kiến thức phù hợp với mô tả công việc</li>
                <li>Tìm hiểu kỹ về công ty mà mình ứng tuyển</li>
                <li>Lên kịch bản trả lời cho câu hỏi tình huống</li>
                <li>Soạn sẵn câu hỏi cho người tuyển dụng</li>
              </ul>
            </div>
          </div>

        </div>
        <!-- /.col-lg-3 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><strong>Copyright</strong> &copy; Our Website 2022 <br><span style="font-size: 12px;"> by 51800287 - 52000786 - 52100920</span></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="./js/index.js"></script>
</body>
</html>