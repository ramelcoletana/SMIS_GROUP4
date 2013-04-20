<?php

    include '../classes/functions.php';
    $page = $_POST['page'];
    $category = $_POST['category'];
    $paginate = new sqlfunction();
    $paginate->processPaginate($page,$category);
?>
