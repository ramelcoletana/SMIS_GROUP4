<?php

include '../classes/functions.php';

$category = $_POST['category'];
$viewFees = new sqlfunction();
$viewFees->showFeesForFullPayment($category);

?>