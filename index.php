<?php $title = 'Home| IT'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'db/conn.php'; ?>

<?php
$result = $crud->getSpecialities();
?>

<h1 class="text-center">Registation For IT Conference</h1>

<form class="registration-form" method="post" action="success.php" enctype="multipart/form-data">
  <div class="mb-3 row">
    <div class="col">
      <label for="first-name" class="form-label">First Name</label>
      <input required type="text" class="form-control" id="first-name" name="first-name" aria-describedby="first-name-help">
      <div id="first-name-help" class="form-text">Enter your first name.</div>
    </div>
    <div class="col">
      <label for="last-name" class="form-label">Last Name</label>
      <input required type="text" class="form-control" id="last-name" name="last-name" aria-describedby="last-name-help">
      <div id="last-name-help" class="form-text">Enter your last name.</div>
    </div>
  </div>
  <div class="mb-3">
    <label for="birth-date" class="form-label">Date of Birth</label>
    <input required type="text" class="form-control" id="birth-date" name="birth-date" aria-describedby="birth-date-help">
    <div id="birth-date-help" class="form-text">Enter your Birth date.</div>
  </div>
  <div class="mb-3">
    <label for="speciality" class="form-label">Area of Speciality</label>
    <select class="form-select" id="speciality" name="speciality" aria-describedby="speciality-help">
      <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value="<?php echo $r['specialities_id']; ?>"><?php echo $r['specialities_name']; ?></option>
      <?php } ?>
    </select>
    <div id="speciality-help" class="form-text">Select your speciality from dropdown.</div>
  </div>
  <div class="mb-3">
    <label for="email-address" class="form-label">Email Address</label>
    <input required type="email" class="form-control" id="email-address" name="email-address" aria-describedby="email-help">
    <div id="email-help" class="form-text">Enter your Email Address</div>
  </div>
  <div class="mb-3">
    <label for="phone-number" class="form-label">Contact Number</label>
    <input required type="phone" class="form-control" id="phone-number" name="phone-number" aria-describedby="phone-help">
    <div id="phone-help" class="form-text">Enter your Mobile Number</div>
  </div>
  <div class="mb-3">
    <label class="form-label" for="customFile">Upload File</label>
    <input required type="file" class="form-control" id="customFile" name="avatar"/>
  </div>
  <div class="d-grid gap-2">
    <button class="btn btn-primary" type="submit" name="register-button">Register</button>
  </div>
</form>

<?php require_once 'includes/footer.php'; ?>