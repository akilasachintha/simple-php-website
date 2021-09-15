<?php $title = 'View Records'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/authcheck.php'; ?>
<?php require_once 'db/conn.php'; ?>

<?php
if (!isset($_GET['id'])) {
    include 'includes/errormessage.php';
    header('Location: viewrecords.php');
} else {
    $id = $_GET['id'];
    $result = $crud->getAttendeDetails($id);
?>



    <div class="card" style="width: 18rem;">
        <img src="<?php echo empty($result['avatar_path']) ? 'uploads/default.png' : $result['avatar_path']; ?>" width="100px" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['first_name'] . ' ' . $result['last_name']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['specialities_name']; ?></h6>
            <p class="card-text">Birth Date: <?php echo $result['birth_date']; ?></p>
            <p class="card-text">Email Address: <?php echo $result['email_address']; ?></p>
            <p class="card-text">Phone Number: <?php echo $result['phone_number']; ?></p>
        </div>
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['attende_id']; ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?php echo $result['attende_id']; ?>" onclick="return confirm('Are You sure delete this record!');" class="btn btn-danger">Delete</a>
    </div>
    <br>
<?php } ?>

<?php require_once 'includes/footer.php'; ?>