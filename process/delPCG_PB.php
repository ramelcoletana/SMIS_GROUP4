<?php

    include '../classes/functions.php';
    
    $transactionNo = $_POST['transactionNo'];
    $studentNo = $_POST['studentNo'];
    
    $del = new sqlfunction();
    $del->delPCG_PB($transactionNo,$studentNo);

?>
