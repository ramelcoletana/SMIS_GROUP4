<?php
	include '../classes/functions.php';

	$category = $_POST['category'];
	$studentId = $_POST['studentId'];
	$enrollNo = $_POST['enrollNo'];
	$transactionNo = $_POST['transactionNo'];
	$paymentMode = $_POST['paymentMode'];
	$show = new sqlfunction();
	$show->showFeesMonthlyPaymnt($category,$studentId,$enrollNo,$transactionNo,$paymentMode);
?>
