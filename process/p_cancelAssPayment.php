<?php
include "../classes/functions_payment.php";
$enrollmentNo = $_POST['enrollmentNo'];
$studentNo = $_POST['studentNo'];
$curAssNo = $_POST['curAssNo'];
$nextAssNo = $_POST['nextAssNo'];
$cancel = new payment();
$cancel -> p_cancelAssPayment($enrollmentNo, $studentNo, $curAssNo, $nextAssNo);