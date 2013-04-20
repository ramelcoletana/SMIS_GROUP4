<?php

include '../classes/functions.php';

$category = $_POST['category'];
$show = new sqlfunction();
$show->showSubjectsByYearLevel($category);
?>
