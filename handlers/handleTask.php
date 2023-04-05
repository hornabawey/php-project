<?php 
session_start();
$errors =[]; 
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $task_name = trim(htmlentities(htmlspecialchars($_POST['task_name'])));


    if(empty($task_name)){
        $errors[]="please enter an task name";

    }elseif(strlen($task_name)<3){

        $errors[]="task name is too short";
    }elseif(strlen($task_name)>20){
        $errors[]="task name is too long";
    }
    
if(empty($errors)){
    $_SESSION['success'] = "task created";
    if(!isset($_SESSION['data'])){
        $_SESSION['data'] =[];

    }
       $_SESSION['data'] [] =$task_name;
    }
    else{
        $_SESSION['errors'] = $errors;
    }
    header("Location:../form.php");

}




?>