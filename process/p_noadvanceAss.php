<?php
include "../classes/functions_payment.php";
	$enrollmentNo = $_POST['enrollmentNo'];
	$studentNo = $_POST['studentNo'];
	$autoId = $_POST['autoId'];
	$assName = $_POST['assName'];
	$assessmentNo = $_POST['assessmentNo'];
	$balance = $_POST['balance'];
    $assOrigAmnt = $_POST['assOrigAmnt'];
    $assCPayment = $_POST['assCPayment'];
	
	$nb = new payment();
	$nb->p_noadvanceAss($enrollmentNo,$studentNo,$autoId,$assName,$assessmentNo,$balance,$assOrigAmnt,$assCPayment);
