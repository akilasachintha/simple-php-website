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
      <th scope="col">Birth Day</th>
      <th scope="col">Specialities</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
    <?php while($r = $result -> fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $r['attende_id']; ?></td>
            <td><?php echo $r['first_name']; ?></td>
            <td><?php echo $r['last_name']; ?></td>
            <td><?php echo $r['birth_date']; ?></td>
            <td><?php echo $r['specialities_name']; ?></td>
            <td><?php echo $r['email_address']; ?></td>
            <td><?php echo $r['phone_number']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>


<?php require_once 'includes/footer.php'; ?>