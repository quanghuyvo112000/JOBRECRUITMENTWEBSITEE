<?php 
    include_once('../sql/dhb.php');
    session_start();
    $_SESSION['user_name'];
    $user_name = $_SESSION['user_name'];
    $mess = "";

    if(!isset($_SESSION['user_id'])){
        header('location: ../app/dangnhap.php');
    }

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
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="authorUrl" content="http://codewithmark.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 


	<script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
  
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form-style.css">
    <title>Tạo CV</title>
    <style>
        body{
            background-image: url("img/background_cv.jpg");
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }
        @media (min-width: 1400px){
            body > .container{
                max-width: 900px;
            }
        }
    </style>
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
                    <a class="nav-link active" href="#">Tạo CV</a>
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
    <div class="container">
        <form action="create_cv.php" method="post" enctype="multipart/form-data" id="cv-form">
            <h4 class="title">Tạo CV</h4>
            <div class="card inner-container">
                <div class="mb-3">
                    <b>Chọn ảnh cá nhân:</b>
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
                <h4 class="title_card">Thông tin cá nhân</h4>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Họ và Tên</label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Ngày sinh</label>
                    <input type="date" name="date" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Giới tính</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Nam">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Nữ">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Nữ
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Điện thoại</label>
                    <input type="number" name="phone" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="formGroupExampleInput" placeholder="">
                    <br>
                </div>
                <div class="dropdown-divider"></div>
                <h4 class="title_card">Giới thiệu bản thân</h4>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Mô tả bản thân</label>
                    <textarea name="description" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Kinh nhiệm làm việc</label>
                    <select name="exp" id="exp" class="form-control">
                        <option value="Chưa có kinh nghiệm">Chưa có kinh nghiệm</option>
                        <option value="Đã có kinh nghiệm">Đã có kinh nghiệm</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Số năm kinh nghiệm</label>
                    <input type="number" name="exp_number" value ="0" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="job" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Vị trí mong muốn</option>
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
                    <div class="form-floating">
                        <select name="salary" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Lương mong muốn</option>
                            <option value="Dưới 300$">Dưới 300$</option>
                            <option value="300$ - 500$">300$ - 500$</option>
                            <option value="500$ - 700$">500$ - 700$</option>
                            <option value="700$ - 1000$">700$ - 1000$</option>
                            <option value="Trên 1000$">Trên 1000$</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn</label>
                    </div>
                    <br>
                </div>
                <div class="dropdown-divider"></div>
                <h4 class="title_card">Học vấn</h4>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Trường Đại Học/ Cao Đẳng</label>
                    <input type="text" name="name_school" class="form-control" id="formGroupExampleInput" placeholder="" style="text-transform: uppercase;">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Trình độ</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="flexRadioDefault3" value="Đã tốt nghiệp Đại Học">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Đã tốt nghiệp Đại Học
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="level" id="flexRadioDefault4" value="Vẫn còn học tại Nhà Trường">
                        <label class="form-check-label" for="flexRadioDefault4">
                            Vẫn còn học tại Nhà Trường
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Thời gian học</label><br>
                     <span class="form_month">Thời gian từ</span><input type="month" name="from_month" class="form-control" id="formGroupExampleInput" placeholder="">
                     <span class="form_month">Thời gian đến</span> <input type="month" name="to_month" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Ngành theo học</label>
                    <input type="text" name="major_school" class="form-control" id="formGroupExampleInput" placeholder="" style="text-transform: uppercase;">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Tạo CV" name="submit" class="btn btn-success" style="width: 100%">
                </div>
            </div>
        </form>
    </div>

    <div class="container" style="display: grid;">
            <?php
                if(isset($_POST["submit"])){
                    if(isset($_POST['name']) && isset($_POST['date']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phone']) &&
                    isset($_POST['address']) && isset($_POST['description']) && isset($_POST['exp']) && isset($_POST['exp_number']) && isset($_POST['job']) &&
                    isset($_POST['skills']) && isset($_POST['salary']) && isset($_POST['name_school']) && isset($_POST['level']) && isset($_POST['from_month']) &&
                    isset($_POST['to_month']) && isset($_POST['major_school'])){

                        $name = $_POST['name'];
                        $date = $_POST['date'];
                        $gender = $_POST['gender'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $description = $_POST['description'];
                        $exp = $_POST['exp'];
                        $exp_number = $_POST['exp_number'];
                        $job = $_POST['job'];
                        $skills = $_POST['skills'];
                        $salary = $_POST['salary'];
                        $name_school = $_POST['name_school'];
                        $level = $_POST['level'];
                        $from_month = $_POST['from_month'];
                        $to_month = $_POST['to_month'];
                        $major_school = $_POST['major_school'];

                        echo"
                            <div class=\"container_content\" id=\"container_content\" style=\"padding: 25px; width: 700px; display: inline-block;margin: auto;\">
                            <h4>Ảnh</h4>
                            <img style=\"width: 150px;\" src=\"$target_file\" alt=\"\"> <br>
                            <hr>
                            <br><h4>Thông tin cá nhân</h4> <br>
                            <label class=\"form-label\">Họ và tên </label> $name <br>
                            <label class=\"form-label\">Ngày sinh </label> $date <br>
                            <label class=\"form-label\">Giới tính </label> $gender <br>
                            <label class=\"form-label\">Email </label> $email <br>
                            <label class=\"form-label\">Điện thoại </label> $phone <br>
                            <label class=\"form-label\">Địa chỉ </label> $address <br>
                            <hr>
                            <br><h4>Giới thiệu bản thân</h4> <br>
                            <label class=\"form-label\">Mô tả bản thân </label> $description <br>
                            <label class=\"form-label\">Kinh nhiệm làm việc </label> $exp <br>
                            <label class=\"form-label\">Số năm kinh nghiệm </label> $exp_number <br>
                            <label class=\"form-label\">Vị trí mong muốn </label> $job <br>
                            <label class=\"form-label\">Kỹ năng trong lĩnh vực </label> <span style=\"text-transform: uppercase;\"> $skills </span> <br>
                            <label class=\"form-label\">Lương mong muốn </label> $salary <br>
                            <hr>
                            <br><h4>Học vấn</h4> <br>
                            <label class=\"form-label\">Trường Đại Học/ Cao Đẳng </label> <span style=\"text-transform: uppercase;\"> $name_school</span>   <br>
                            <label class=\"form-label\">Trình độ </label> $level <br>
                            <label class=\"form-label\">Thời gian học </label><span> Từ</span> $from_month <span>đến</span> $to_month  <br>
                            <label class=\"form-label\">Ngành theo học </label> <span style=\"text-transform: uppercase;\"> $major_school </span> <br>
                        ";
                    }
                }
            ?>

		</div>
        <?php
            if(isset($_POST["submit"])){
                echo"
                    <div class=\"text-center\" style=\"padding:20px;\">
                        <input type=\"button\" id=\"rep\" value=\"Tải CV\" class=\"btn btn-info btn_print\">
                    </div>
                ";
            }
         ?>   

    </div>



</body>

<script type="text/javascript">
	$(document).ready(function($) 
	{ 

		$(document).on('click', '.btn_print', function(event) 
		{
			event.preventDefault();
			
			var element = document.getElementById('container_content'); 

			var opt = 
			{
			  margin:       1,
			  filename:     'CV_'+js.AutoCode()+'.pdf',
			  image:        { type: 'jpeg', quality: 0.98 },
			  html2canvas:  { scale: 2 },
			  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
			};

			// New Promise-based usage:
			html2pdf().set(opt).from(element).save();

			 
		});
	});
</script>
</html>