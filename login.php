<?php $title = 'Login'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'db/conn.php'; ?>


<?php
//Second method to form validation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = strtolower(trim($_POST['username']));
  $password = $_POST['password'];

  $newPassword = md5($password . $username);

  $result = $user->getUser($username, $newPassword);

  if (!$result) {
    echo '<div class="alert alert-danger">Your username or password incorrect.</div>';
  } else {
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['user_id'];
    header('Location: viewrecords.php');
  }
}

?>

<h1 class="text-center">Login</h1>

<form class="login-form" method="post" action=<?php echo htmlentities($_SERVER['PHP_SELF']); ?>>
  <div class="mb-3">
    <label for="login-username" class="form-label">User Name</label>
    <input required type="text" class="form-control" id="login-username" aria-describedby="username-help" name="username" value=<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>>
    <div id="username-help" class="form-text">We'll never share your username with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="login-password" class="form-label">Password</label>
    <input required type="password" class="form-control" id="login-password" aria-describedby="password-help" name="password">
    <div id="password-help" class="form-text">We'll never share your password with anyone else.</div>
  </div>
  <div class="d-grid gap-2">
    <button class="btn btn-primary" type="submit" name="login-button">Login</button>
  </div>
</form>

<?php require_once 'includes/footer.php'; ?>