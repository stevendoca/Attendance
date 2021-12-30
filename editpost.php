<?php
require_once 'db/conn.php';
//Get value from post operation
if(isset($_POST['submit'])){
    //exact values from the $_POST array
    $id = $_POST['id'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['speciality'];

    //Call Crud function
    $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty,);
    if ($result){
        header("Location: index.php");
    }else{
        include 'includes/errorMessage.php';
    }
}
else{
    include 'includes/errorMessage.php';
}
?>