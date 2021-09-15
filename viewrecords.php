<?php $title = 'View Records'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'db/conn.php'; ?>

<?php 
    $result = $crud -> getAttendies();
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Specialities</th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while($r = $result -> fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $r['attende_id']; ?></td>
            <td><?php echo $r['first_name']; ?></td>
            <td><?php echo $r['last_name']; ?></td>
            <td><?php echo $r['specialities_name']; ?></td>
            <td scope="col">
              <a href="view.php?id=<?php echo $r['attende_id']; ?>" class="btn btn-primary">View</a>
              <a href="edit.php?id=<?php echo $r['attende_id']; ?>" class="btn btn-warning">Edit</a>
              <a href="delete.php?id=<?php echo $r['attende_id']; ?>" onclick="return confirm('Are You sure delete this record!');" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>


<?php require_once 'includes/footer.php'; ?>