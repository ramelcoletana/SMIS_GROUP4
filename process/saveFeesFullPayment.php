<?php
    include '../classes/functions.php';
    
    $transactionNo = $_POST['transactionNo'];
    $enrollmentNo = $_POST['enrollmentNo'];
    $studentNum = $_POST['studentNum'];
    $category = $_POST['category'];
    $balance = $_POST['balance'];
    $modePayment = $_POST['modePayment'];
    $tAmount = $_POST['tAmount'];
    $amountT = $_POST['amountT'];
    $date = $_POST['date'];
    
    $save = new sqlfunction();
    $save->saveFeesFullPayment($transactionNo,$enrollmentNo,$studentNum,$balance,$modePayment,$category,$tAmount,$amountT,$date);
?>
