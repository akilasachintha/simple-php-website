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
      include 'includes/successmessage.php'; 
    }
    else{
        echo '<h1 class="text-center text-danger">There was an Error.</h1>';
    }

} ?>


<?php require_once 'includes/footer.php' ?>