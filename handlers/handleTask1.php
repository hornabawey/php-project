<?php 
session_start();
$errors =[]; 



if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $name = trim(htmlentities(htmlspecialchars($_POST['name'])));
    $email = trim(htmlentities(htmlspecialchars($_POST['email'])));
    $password = trim(htmlentities(htmlspecialchars($_POST['password'])));


    if(empty($name)){
        $errors[]="name required";

    }elseif(strlen($name)<3){

        $errors[]="name must be greater than 3 chars";
    }elseif(strlen($name)>20){
        $errors[]="name must be smaller than 20 chars";
    }

    if(empty($email)){
        $errors[]="email required";}

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[]="please enter a valid email";}
            
    if(empty($password)){
        $errors[] = "password required";
    }elseif(strlen($password)<6){
        $errors[] ="password must be greater than 6 chars";
    }elseif(strlen($password)>20){
        $errors[] = "password must be smaller than 25 chars";
    }
    
    if(empty($errors)){
        $_SESSION['success'] = "task created";
        if(!isset($_SESSION['data'])){
            $_SESSION['data'] =[];
    
        }
           $_SESSION['data'] [] =$name;
          
        }
        else{
            $_SESSION['errors'] = $errors;
        }
        header("Location:../registration.php");
    
    }
    
    
    
    
    ?>