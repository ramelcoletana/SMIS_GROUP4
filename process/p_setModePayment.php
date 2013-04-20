<?php
include '../classes/functions_payment.php';
	$enrollmentNo = $_POST['enrollmentNo'];
	$studentNo = $_POST['studentNo'];
	$set = new payment();
	$set->p_setModePayment($enrollmentNo,$studentNo);
?>