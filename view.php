<?php
$title = "View";
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

//Get attendee by id
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $crud->getAttendeeDetails($id);
} else {
  echo "<h1 class='text-danger'> Please check details and try again</h1>";
}
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['firstName'] . ' ' . $result['lastName'] ?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'] ?></h6>
    <p class="card-text">Date of Birth: <?php echo $result['dateOfBirth'] ?>.</p>
    <p class="card-text">Email: <?php echo $result['emailAddress'] ?>.</p>
    <p class="card-text">Contact Number: <?php echo $result['contactNumber'] ?>.</p>

  </div>
</div>

<div>
</br>
  <a href="viewrecords.php" class="btn btn-info">Back to List</a>
  <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
  <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
</div>

<?php require_once 'includes/footer.php' ?>