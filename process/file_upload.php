<?php
	include '../classes/functions.php';
	$_SESSION['student_id'] = $_POST['h_student_id'];
	$upload_location = "../upload_pic/";
	$get_pic_loc = "upload_pic/";

    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_FILES['photo_upload']['name'];
        $size = $_FILES['photo_upload']['size'];
        $type = $_FILES['photo_upload']['type'];
        $error = $_FILES['photo_upload']['error'];
        $tmp_name = $_FILES['photo_upload']['tmp_name'];

        if($error>0){
            echo '<div class="info" style="width:500px;">Sorry, you attempted to upload an invalid file format. <br>Only jpg, jpeg, gif and png image files are allowed. Thanks.</div><br clear="all" />';
        }else if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
            if(file_exists($get_pic_loc.$name)){
                echo '<div class="info" style="width:500px;">File already exists.</div><br clear="all" />';
            }else{
                move_uploaded_file($tmp_name, $upload_location.$name);
                $save = new sqlfunction();
                $save->check($name, $_SESSION['student_id']);
            }
        }

    }
?>