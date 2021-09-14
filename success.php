<?php $title = 'Success Page'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'db/conn.php'; ?>


<?php if(isset($_POST['register-button'])){
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $dob = $_POST['birth-date'];
    $speciality = $_POST['speciality'];
    $email = $_POST['email-address'];
    $phone = $_POST['phone-number'];

    $isSuccess = $crud -> insertAttendies($fname, $lname, $dob, $speciality, $email, $phone);

    if($isSuccess){
        echo '<h1 class="text-center text-success">Successfully Registered.</h1>';
    }
    else{
        echo '<h1 class="text-center text-danger">There was an Error.</h1>';
    }

} ?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['first-name'] . ' ' .$_POST['last-name']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['speciality']; ?></h6>
    <p class="card-text">Birth Dat: <?php echo $_POST['birth-date']; ?></p>
    <p class="card-text">Email Address: <?php echo $_POST['email-address']; ?></p>
    <p class="card-text">Phone Number: <?php echo $_POST['phone-number']; ?></p>
  </div>
</div>

<?php require_once 'includes/footer.php' ?>