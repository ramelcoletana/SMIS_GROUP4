<?php

    include '../classes/functions.php';
    
    $transactionNo = $_POST['transactionNo'];
    $studentNo = $_POST['studentNo'];
    $delete = new sqlfunction();
    $delete->deleteCurrenMSPayment($transactionNo,$studentNo);
?>
