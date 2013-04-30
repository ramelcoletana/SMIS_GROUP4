<?php
include "../classes/functions_payment.php";
$transactionNo = $_POST['transactionNo'];
$enrollmentNo = $_POST['enrollmentNo'];
$studentNo = $_POST['studentNo'];
$assName = $_POST['assName'];
$amountP = $_POST['amountP'];
$insert = new payment();
$insert -> p_inToPBdown($transactionNo, $enrollmentNo, $studentNo, $assName, $amountP);
?>