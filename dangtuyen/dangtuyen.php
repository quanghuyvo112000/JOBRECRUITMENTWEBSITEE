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

    $mess = "";

    if(isset($_POST["submit"])) {
        if(isset($_FILES['fileUpload'])){
            //Thư mục bạn lưu file upload
            $target_dir = "uploads/";
            //Đường dẫn lưu file trên server
            $target_file   = $target_dir . basename($_FILES["fileUpload"]["name"]);
            $allowUpload   = true;
            //Lấy phần mở rộng của file (txt, jpg, png,...)
            $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
            //Những loại file được phép upload
            $allowtypes    = array('txt', 'dat', 'data', 'png', 'jpg');
            //Kích thước file lớn nhất được upload (bytes)
            $maxfilesize   = 10000000;//10MB
    
            //1. Kiểm tra file có bị lỗi không?
            if ($_FILES["fileUpload"]['error'] != 0) {
                $mess = "<br>File bị lỗi không thể tải.";
                die;
            }
    
            //2. Kiểm tra loại file upload có được phép không?
            if (!in_array($fileType, $allowtypes )) {
                $mess = "<br>Chỉ được upload file .txt, .dat, .data, png, or jpg.";
                $allowUpload = false;
            }
            
            //3. Kiểm tra kích thước file upload có vượt quá giới hạn cho phép
            if ($_FILES["fileUpload"]["size"] > $maxfilesize) {
                $mess = "<br>Kích thước file tải lên lớn hơn $maxfilesize bytes.";
                $allowUpload = false;
            }
    
            //4. Kiểm tra file đã tồn tại trên server chưa?
            if (file_exists($target_file)) {
                $mess = "<br>File đã tồn tại.";
                $allowUpload = false;
            }
    
            if ($allowUpload) {
                //Lưu file vào thư mục được chỉ định trên server
                if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                    $mess = "<br>File ". basename( $_FILES["fileUpload"]["name"])." uploaded thành công.";
                    $mess = "The file saved at " . $target_file;
    
                } else {
                    $mess ="<br>Upload bị lỗi.";
                }
            }
        }

        // Insert dữ liệu

        if(isset($_POST['name']) && isset($_POST['area']) && isset($_POST['address']) && isset($_POST['description']) &&
        isset($_POST['job']) && isset($_POST['skills']) && isset($_POST['job_detail']) && isset($_POST['rank']) && isset($_POST['exp_number']) && isset($_POST['type_job']) &&
        isset($_POST['salary']) && isset($_POST['interview']) && isset($_POST['slogan'])){
            $name = $_POST['name'];
            $area = $_POST['area'];
            $address = $_POST['address'];
            $description = $_POST['description'];
            $description = nl2br($description);
            $job = $_POST['job'];
            $skills = $_POST['skills'];
            $job_detail = $_POST['job_detail'];
            $job_detail = nl2br($job_detail);
            $rank = $_POST['rank'];
            $exp_number = $_POST['exp_number'];
            $type_job = $_POST['type_job'];
            $salary = $_POST['salary'];
            $interview = $_POST['interview'];
            $slogan = $_POST['slogan'];
            $result = $conn->query("SELECT `email` FROM `user_form` WHERE `id_user` = '$id'");
            $result = $result->fetch_assoc();
            $email = $result['email'];
            mysqli_query($conn,"INSERT INTO `dangtuyen_form`(id_user, `email`, name_company, slogan, img, area, address, description, job, skills, job_detail, rank, exp_number, type_job, salary, interview) 
            VALUES ('$id', '$email','$name', '$slogan','$target_file','$area','$address','$description','$job','$skills','$job_detail','$rank','$exp_number','$type_job','$salary','$interview')")  or die('query failed');
        }

        header('location: ../dangtuyen/quanly.php');
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
    <title>Đăng tuyển nhân sự</title>
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
                    <a class="nav-link active" href="#">Đăng tuyển</a>
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

    <div class="container">
        <form action="dangtuyen.php" method="post" enctype="multipart/form-data" id="cv-form">
            <h4 class="title">Đăng Tuyển Nhân Sự</h4>
            <div class="card inner-container">
                <div class="mb-3">
                    <b>Chọn ảnh đại diện công ty:</b>
                    <br>
                    <br>
                    <div class="card">
                        <input type="file" name="fileUpload" id="fileUpload" accept=".png, .jpg">
                    </div>
                    <br>
                    <?php  
                        echo $mess; 
                    ?>
                    <br>
                </div>
                <div class="dropdown-divider"></div>
                <h4 class="title_card">Thông tin công ty</h4>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Tên công ty</label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Slogan công ty</label>
                    <input type="text" name="slogan" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="area" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Khu vực</option>
                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="Đà Nẵng">Đà Nẵng</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="formGroupExampleInput" placeholder="">
                    <br>
                </div>
                <div class="dropdown-divider"></div>
                <h4 class="title_card">Giới thiệu công việc</h4>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Mô tả công việc</label>
                    <textarea name="description" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="job" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Vị trí muốn tuyển</option>
                            <option value="Web Developer">Web Developer</option>
                            <option value="UI/ UX Designer">UI/ UX Designer</option>
                            <option value="Tester">Tester</option>
                            <option value="Business Analyst (BA)">Business Analyst(BA)</option>
                            <option value="Project Manager (PM)">Project Manager (PM)</option>
                            <option value="IoT">IoT</option>
                            <option value="IT Helpdesk">IT Helpdesk</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Kỹ năng trong lĩnh vực</label>
                    <input type="text" name="skills" class="form-control" id="formGroupExampleInput" placeholder="" style="text-transform: uppercase;">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"> Yêu cầu kỹ năng và chuyên môn trong công việc</label>
                    <textarea name="job_detail" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="rank" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Vị trí cấp bậc</option>
                            <option value="Junior">Junior</option>
                            <option value="Middle">Middle</option>
                            <option value="Senior">Senior</option>
                            <option value="Fresher">Fresher</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Số năm kinh nghiệm</label>
                    <input type="number" name="exp_number" value ="0" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="type_job" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Loại hình</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Remote">Remote</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="salary" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Mức lương</option>
                            <option value="Dưới 300$">Dưới 300$</option>
                            <option value="300$ - 500$">300$ - 500$</option>
                            <option value="500$ - 700$">500$ - 700$</option>
                            <option value="700$ - 1000$">700$ - 1000$</option>
                            <option value="Trên 1000$">Trên 1000$</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Vòng phỏng vấn</label>
                    <input type="number" name="interview" class="form-control" id="formGroupExampleInput" value="1" placeholder="">
                    <br>
                </div>
                
                <div class="mb-3">
                    <input type="submit" value="Đăng Tuyển" name="submit" class="btn btn-success" style="width: 100%">
                </div>
            </div>
        </form>
    </div>
</body>
</html>