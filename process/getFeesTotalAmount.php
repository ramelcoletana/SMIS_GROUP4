<?php
	include '../classes/functions.php';

	$category = $_POST['category'];
	$getTotalAmount = new sqlfunction();
	$getTotalAmount->getFeesTotalAmount($category);
?>