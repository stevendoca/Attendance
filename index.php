<?php 
$title= "Index";
require_once 'includes/header.php'; 
require_once 'db/conn.php';
$results = $crud->getSpecialties(); 
?>
<h1 class="text-center">PHP Project</h1>
<form method="post" action="success.php">
<div class="form-group">
    <label for="firstName">First Name</label>
    <input required type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name">
  </div>
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input required type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name">
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth</label>
    <input required type="text" id="dob" name="dob" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="speciality">Your expertiese</label>
    <select class="form-control" id="speciality" name="speciality">
      <?php while($r= $results->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
        <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="phone">Contact Number</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>
  <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <label class="custom-file-label" for="avatar">Choose File</label>
        <small id="avatar" class="form-text text-warning ">File Upload is Optional</small>
  </div>
  <br>
  <br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<?php require_once 'includes/footer.php'?>
