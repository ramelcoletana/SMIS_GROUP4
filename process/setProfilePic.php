<?php
include "../classes/functions.php";
$student_id = $_POST['student_id'];
$set = new sqlfunction();
$set -> setProfilePic($student_id);
?>