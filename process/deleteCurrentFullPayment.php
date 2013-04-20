<?php

    include '../classes/functions.php';
    $enrollmentNo = $_POST['enrollmentNo'];
    $studentNum = $_POST['studentNum'];
    $delete = new sqlfunction();
    $delete->deleteCurrentFullPayment($enrollmentNo,$studentNum);
?>
