<?php
include '../classes/functions_payment.php';
	$enrollmentNo = $_POST['enrollmentNo'];
	$studentNo = $_POST['studentNo'];
	$get = new payment();
	$get->p_getCurrentAssessment($enrollmentNo,$studentNo);
?>