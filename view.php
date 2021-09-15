<?php $title = 'View Records'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'db/conn.php'; ?>

<?php 
    if(!isset($_GET['id'])){
        echo '<h1 class="text-danger">Please check detatis and try again</h1>';   
    }
    else{
        $id = $_GET['id'];
        $result = $crud -> getAttendeDetails($id);    
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $result['first_name'] . ' ' . $result['last_name']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['specialities_name']; ?></h6>
        <p class="card-text">Birth Date: <?php echo $result['birth_date']; ?></p>
        <p class="card-text">Email Address: <?php echo $result['email_address']; ?></p>
        <p class="card-text">Phone Number: <?php echo $result['phone_number']; ?></p>
    </div>
</div>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>