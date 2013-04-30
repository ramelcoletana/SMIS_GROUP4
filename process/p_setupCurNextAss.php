<?php
include "../classes/functions_payment.php";
$enrollmentNo = $_POST['enrollmentNo'];
$studentNo = $_POST['studentNo'];
$curAssNo = $_POST['curAssNo'];
$nextAssNo = $_POST['nextAssNo'];
$assName = $_POST['assName'];
$origBal = $_POST['origBal'];
$assAmount = $_POST['assAmount'];
$assAdvance = $_POST['assAdvance'];
$assBalance = $_POST['assBalance'];
$setup = new payment();
$setup -> p_setupCurNextAss($enrollmentNo, $studentNo, $curAssNo, $nextAssNo, $assName, $origBal, $assAmount, $assAdvance, $assBalance);