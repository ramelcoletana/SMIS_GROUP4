<?php

    include '../classes/functions.php';
    
    $dateNow = $_POST['dateNow'];
    $transactionNo = $_POST['transactionNo'];
    $enrollmentNo = $_POST['enrollmentNo'];
    $studentNo = $_POST['studentNo'];
    $totalAmountPaid = $_POST['totalAmountPaid'];
    $amountTendered = $_POST['amountTendered'];
    $process = new sqlfunction();
    $process->paymentMSProcess($dateNow,$transactionNo,$enrollmentNo,$studentNo,$totalAmountPaid,$amountTendered);
?>
