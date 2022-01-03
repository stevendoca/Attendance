<?php
    $title="Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendEmail.php';

    if(isset($_POST['submit'])) {
      //exact values from the $_POST array
      $fname = $_POST['firstName'];
      $lname = $_POST['lastName'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $contact = $_POST['phone'];
      $specialty = $_POST['speciality'];

      $orig_file = $_FILES["avatar"]["tmp_name"];
      $target_dir = 'uploads/';
      $destination = $target_dir . basename($_FILES["avatar"]["name"]);
      move_uploaded_file($orig_file,$destination);
      //call function to insert and track if success or not
      $isSuccess = $crud->insertAttendees( $fname,$lname,$dob,$email,$contact,$specialty);
      $specialtyName = $crud->getSpecialtiesById($specialty);
    }
    if ($isSuccess){
      SendEmail::SendEmail($email,'Welcome to IT Conference 2022', 'You have successfully registerted for this year\'s IT Conference');
     include "includes/successMessage.php";
    }else{
      include "includes/errorMessage.php";
    }
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstName'] .' ' . $_POST['lastName'] ?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialtyName['name'] ?></h6>
    <p class="card-text">Date of Birth: <?php echo $_POST['dob'] ?>.</p>
    <p class="card-text">Email: <?php echo $_POST['email'] ?>.</p>
    <p class="card-text">Contact Number: <?php echo $_POST['phone'] ?>.</p>
    
  </div>
</div>
    
<?php
    require_once 'includes/footer.php';
?>