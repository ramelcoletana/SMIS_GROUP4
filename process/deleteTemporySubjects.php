<?php

	include '../classes/functions.php';
	$enrollmentNo = $_POST['enrollmentNo'];
	$studentNum = $_POST['studentNum'];
	$deleteS = new sqlfunction();
	$deleteS->deleteTemporySubjects($enrollmentNo,$studentNum);
?>