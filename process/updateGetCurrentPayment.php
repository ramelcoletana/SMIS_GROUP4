<?php

    include '../classes/functions.php';
    
    $transactionNo = $_POST['transactionNo'];
    $enrollmentNo = $_POST['enrollmentNo'];
    $studentNo = $_POST['studentNo'];
    $assessmentName = $_POST['assessmentName'];
    $currentPayment = $_POST['currentPayment'];
    $balance = $_POST['balance'];
    
    $updateGet = new sqlfunction();
    $updateGet->updateGetCurrentPayment($transactionNo,$enrollmentNo,$studentNo,$assessmentName,$currentPayment,$balance);
    
?>
