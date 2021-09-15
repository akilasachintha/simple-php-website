<?php $title = 'Edit Records'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/authcheck.php'; ?>
<?php require_once 'db/conn.php'; ?>

<?php
$result = $crud->getSpecialities();

if (!isset($_GET['id'])) {
    include 'includes/errormessage.php';
    header('Location: edit.php'); 
} 
else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeDetails($id);

?>

    <h1 class="text-center">Edit Record</h1>

    <form class="registration-form" method="post" action="editpost.php">
        <input type="hidden" name="attende-id" value="<?php echo $attendee['attende_id']; ?>">
        <div class="mb-3 row">
            <div class="col">
                <label for="first-name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first-name" name="first-name" aria-describedby="first-name-help" value="<?php echo $attendee['first_name']; ?>">
                <div id="first-name-help" class="form-text">Enter your first name.</div>
            </div>
            <div class="col">
                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last-name" name="last-name" aria-describedby="last-name-help" value="<?php echo $attendee['last_name']; ?>">
                <div id="last-name-help" class="form-text">Enter your last name.</div>
            </div>
        </div>
        <div class="mb-3">
            <label for="birth-date" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="birth-date" name="birth-date" aria-describedby="birth-date-help" value="<?php echo $attendee['birth_date']; ?>">
            <div id="birth-date-help" class="form-text">Enter your Birth date.</div>
        </div>

        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Speciality</label>
            <select class="form-select" id="speciality" name="speciality" aria-describedby="speciality-help">
                <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialities_id']; ?>" <?php if ($r['specialities_id'] == $attendee['specialities_id']) echo 'selected'; ?>>
                        <?php echo $r['specialities_name']; ?>
                    </option>
                <?php } ?>
            </select>
            <div id="speciality-help" class="form-text">Select your speciality from dropdown.</div>
        </div>

        <div class="mb-3">
            <label for="email-address" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email-address" name="email-address" aria-describedby="email-help" value="<?php echo $attendee['email_address']; ?>">
            <div id="email-help" class="form-text">Enter your Email Address</div>
        </div>
        <div class="mb-3">
            <label for="phone-number" class="form-label">Contact Number</label>
            <input type="phone" class="form-control" id="phone-number" name="phone-number" aria-describedby="phone-help" value="<?php echo $attendee['phone_number']; ?>">
            <div id="phone-help" class="form-text">Enter your Mobile Number</div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit" name="update-button">Save Changes</button>
            <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        </div>
    </form>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>