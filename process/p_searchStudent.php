<?php
include "../classes/functions_payment.php";
    $student_id = $_POST['studentId'];
	$_SESSION['student_id'] = $student_id;
    
    $search = new payment();
    $search->p_search_student($student_id);
?>
