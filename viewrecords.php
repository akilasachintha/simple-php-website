<?php $title = 'View Records'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/authcheck.php'; ?>
<?php require_once 'db/conn.php'; ?>

<?php
$result = $crud->getAttendies();
?>
<div class="row border-bottom">
  <div class="col">#</div>
  <div class="col">First Name</div>
  <div class="col">Last Name</div>
  <div class="col">Specialities</div>
  <div class="col">Actions</div>

</div>
<?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
  <div class="row">
    <div class="col"><?php echo $r['attende_id']; ?></div>
    <div class="col"><?php echo $r['first_name']; ?></div>
    <div class="col"><?php echo $r['last_name']; ?></div>
    <div class="col"><?php echo $r['specialities_name']; ?></div>
    <div class="col">
      <a href="view.php?id=<?php echo $r['attende_id']; ?>" class="btn btn-primary">View</a>
      <a href="edit.php?id=<?php echo $r['attende_id']; ?>" class="btn btn-warning">Edit</a>
      <a href="delete.php?id=<?php echo $r['attende_id']; ?>" onclick="return confirm('Are You sure delete this record!');" class="btn btn-danger">Delete</a>
    </div>
  </div>

<?php } ?>



<?php require_once 'includes/footer.php'; ?>