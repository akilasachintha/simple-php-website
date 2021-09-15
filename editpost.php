<?php $title = 'Edit Details'; ?>

<?php require_once 'db/conn.php'; ?>


<?php

if (isset($_POST['update-button'])) {
    $id = $_POST['attende-id'];
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $dob = $_POST['birth-date'];
    $speciality = $_POST['speciality'];
    $email = $_POST['email-address'];
    $phone = $_POST['phone-number'];

    $isSuccess = $crud->editAttendies($id, $fname, $lname, $dob, $speciality, $email, $phone);

    if ($isSuccess) {
        header("Location: index.php");
    } else {
        include 'includes/errormessage.php'; 
    }
}

?>


<?php require_once 'includes/footer.php' ?>