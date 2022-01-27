<?php 
require_once 'db/conn.php'; 
require_once 'includes/auth_check.php';

if(!$_GET['id']){
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");
}else{
    $id = $_GET['id'];
    
    $result = $crud->deleteAttendee($id);
    if($result){
        header("Location: viewrecords.php");
    }else{
        echo 'error';
    }
}
?>