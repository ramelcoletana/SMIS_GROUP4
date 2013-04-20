<?php
    
    session_start();
    
    include '../classes/functions.php';
    
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = new sqlfunction();
        $userAuth = $login->loginUsers($username,$password);
        echo $userAuth;
        if($userAuth=="notexist"){
            //echo 'Username not exist!';
            header("Location: index.php");
        }else if($userAuth=="Administrator"){
            header("Location: admin/index.php");
        }else if($userAuth=="Student"){
            header("Location: student/index.php");
        }else if($userAuth=="Parent"){
            header("Location: parent/index.php");
        }
    }else{
        header("Location: index.php");
    }
    //not solved ..login

?>
