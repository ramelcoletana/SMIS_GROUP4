<?php

include '../classes/functions.php';

$category = $_POST['category'];
$enrollmentNo = $_POST['enrollmentNo'];
$studentId = $_POST['studentId'];
$saveS = new sqlfunction();
$saveS->saveSubjectsByYearLevel($category,$enrollmentNo,$studentId);

?>
