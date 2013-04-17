<?php
include "../classes/functions_payment.php";
    $enrollmentNO = $_POST['enrollmentNo'];
    $studentNo = $_POST['studentNo'];
    $autoId = $_POST['autoId'];
    $assName = $_POST['assName'];
    $assessmentNo = $_POST['assessmentNo'];
    $assBalance = $_POST['assBalance'];
    $assAdvance = $_POST['assAdvance'];
    $assOrigAmnt = $_POST['assOrigAmnt'];
    $assCPayment = $_POST['assCPayment'];

    $ha = new payment();
    $ha->p_hasadvance($enrollmentNO,$studentNo,$autoId,$assName,$assessmentNo,$assBalance,$assAdvance,$assOrigAmnt,$assCPayment);