<?php require_once 'includes/authcheck.php'; ?>
<?php require_once 'db/conn.php'; ?>

<?php
if (!isset($_GET['id'])) {
    include 'includes/errormessage.php';
    header('Location: viewrecords.php');
} else {
    $id = $_GET['id'];
    $result = $crud->deleteAttendies($id);

    if ($result) {
        header("Location: viewrecords.php");
    } else {
        include 'includes/errormessage.php';
    }
}
?>