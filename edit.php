<?php 
    $title= "Edit Record";
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php'; 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties(); 
    
    if(!isset($_GET['id'])){
       
          include 'includes/errorMessage.php';
    }else{
        $id= $_GET['id'];
        $attendee= $crud->getAttendeeDetails($id);
    
?>
<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']  ?>"></input>
<div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" value="<?php echo $attendee['firstName'] ?>" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name">
  </div>
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" value="<?php echo $attendee['lastName'] ?>" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name">
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth</label>
    <input type="text" value="<?php echo $attendee['dateOfBirth'] ?>" id="dob" name="dob" class="form-control">
  </div>
  <div class="form-group">
    <label for="speciality">Your expertiese</label>
    <select class="form-control" id="speciality" name="speciality">
      <?php while($r= $results->fetch(PDO::FETCH_ASSOC)) {?>
        <option 
            value="<?php echo $r['specialty_id'] ?>" <?php if ($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
            <?php echo $r['name'] ?>
        </option>
        <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" value="<?php echo $attendee['emailAddress'] ?>" class="form-control" id="email" name="email" placeholder="Enter email">
    <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
 
  <div class="form-group">
    <label for="phone">Contact Number</label>
    <input type="text" value="<?php echo $attendee['contactNumber'] ?>" class="form-control" id="phone" name="phone">
  </div>
  
  <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
</form>
<?php require_once 'includes/footer.php'?>
<?php } ?>