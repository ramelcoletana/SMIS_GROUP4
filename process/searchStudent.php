<?php

    include '../classes/functions.php';

    $studentId = $_POST['studentId'];
    $search = new sqlfunction();
    $search->searchStudent($studentId);

?>
