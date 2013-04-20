<?php
	include '../classes/functions.php';

	$transactionNo = $_POST['transactionNo'];
	$delete = new sqlfunction();
	$delete->temDelete($transactionNo);

	//delete this..
?>