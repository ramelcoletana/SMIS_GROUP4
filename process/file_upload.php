<?php
	include '../classes/functions.php';
	$_SESSION['student_id'] = $_POST['h_student_id'];
	$upload_location = "../upload_pic/";
	$get_pic_loc = "upload_pic/";

    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_FILES['photo_upload']['name'];
        $size = $_FILES['photo_upload']['size'];

        $allowedExtensions = array("jpg","jpeg","gif","png"); //Allowed file types
        foreach($_FILES as $file)
        {
            if($file['tmp_name'] > '' && strlen($name))
            {
                if(!in_array(end(explode(".", strtolower($file['name']))), $allowedExtensions))
                {
                    echo '<div class="info" style="width:500px;">Sorry, you attempted to upload an invalid file format. <br>Only jpg, jpeg, gif and png image files are allowed. Thanks.</div><br clear="all" />';
                }
                else
                {
                    if($size<(1024*1024))
                    {
                        $actual_image_name = $name; //This colud be a random anme such as rand(125678, 098754).'.gif';
                        
                        if(move_uploaded_file($_FILES['photo_upload']['tmp_name'], $upload_location.$actual_image_name))
                        {
                            //Run your SQL Query here to insert the new image file named $actual_image_name if you deem it necessary
                            echo $actual_image_name;
                            echo $_SESSION['student_id'];

                            $save = new sqlfunction();
                            $save->check($actual_image_name, $_SESSION['student_id']);
                            //echo '<span class="uploadeFileWrapper"><img src="'.$get_pic_loc.$actual_image_name.'" width="150" height="100"></span><br clear="all" /><br clear="all" />';
                        }
                        else
                        {
                            echo "<div class='info' style='width:500px;'>Sorry, Your Image File could not be uploaded at the moment. <br>Please try again or contact the site admin if this problem persist. Thanks.</div><br clear='all' />";
                        }
                    }
                    else
                    {
                        echo "<div class='info' style='width:400px;'>File exceeded 1MB max allowed file size. <br>Please upload a file at 1MB in size to proceed. Thanks.</div><br clear='all' />";
                    }
                }
            }
            else
            {
                echo "<div class='info' style='width:400px;'>You have just canceled your file upload process. Thanks.</div><br clear='all' />";
            }
        }
    }
?>