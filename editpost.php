<?php 
 require_once 'db/conn.php';

    //GET VALUES FROM POST 
    if(isset($_POST['submit'])){
        //extract values from the $_POST Array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['datepicker'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['speciality'];
        //call crud function
        $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
        //redirect to index.php
        if($result){
             header("Location: viewrecords.php");
        }
    }else{
        include 'includes/errormessage.php';
    }

 ?>