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

    $_SESSION['id_post'];

    $id_post = $_SESSION['id_post'];

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
            $allowtypes    = array('txt', 'dat', 'data', 'png', 'pdf');
            //Kích thước file lớn nhất được upload (bytes)
            $maxfilesize   = 10000000;//10MB
    
            //1. Kiểm tra file có bị lỗi không?
            if ($_FILES["fileUpload"]['error'] != 0) {
                $mess = "<br>File bị lỗi không thể tải.";
                die;
            }
    
            //2. Kiểm tra loại file upload có được phép không?
            if (!in_array($fileType, $allowtypes )) {
                $mess = "<br>Chỉ được upload file .pdf .";
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

        mysqli_query($conn,"INSERT INTO `quanlyfile_cv`(`id_post`, `id_users`, `name`, `file`) 
        VALUES ('$id_post','$id','$user_name','$target_file')")  or die('query failed');
    }
    header('location: ../job/job.php');
?>