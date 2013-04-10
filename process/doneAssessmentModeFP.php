<?php

	include '../classes/functions.php';

	$enrollmentNo = $_POST['enrollmentNo'];
	$studentNum = $_POST['studentNum'];
	$schYear = $_POST['schYear'];
	$gy = $_POST['gy'];
	$status = $_POST['status'];

	$doneA = new sqlfunction();
	$doneA-> doneAssessmentModeFP($enrollmentNo,$studentNum,$schYear,$gy,$status);
?>