<?php
include "../classes/functions_payment.php";
$transactionNo = $_POST['transactionNo'];
$enrollmentNo = $_POST['enrollmentNo'];
$studentNo = $_POST['studentNo'];
$totalCP = $_POST['totalCP'];
$amountT = $_POST['amountT'];
$curAssNo = $_POST['curAssNo'];
$today = $_POST['today'];
$done  = new payment();
$done -> p_doneAssPayment($transactionNo,$enrollmentNo, $studentNo, $totalCP, $amountT, $curAssNo, $today);
?>