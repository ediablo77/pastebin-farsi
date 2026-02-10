<?php
session_start();

define('ADMIN_USER','admin');
define('ADMIN_PASS','YourStrongPassword');

$error = false;

if ($_POST) {
  if ($_POST['user'] === ADMIN_USER && $_POST['pass'] === ADMIN_PASS) {
    $_SESSION['admin'] = true;
    header('Location: dashboard.php');
    exit;
  } else {
    $error = true;
  }
}
?>

<link href="../css/bootstrap.rtl.min.css" rel="stylesheet">

<div class="container py-5" style="max-width:400px">

<div class="card shadow-sm">
  <div class="card-body">
    <h4 class="text-center mb-4">🔐 ورود مدیریت</h4>

    <?php if ($error): ?>
      <div class="alert alert-danger">نام کاربری یا رمز اشتباه است</div>
    <?php endif; ?>

    <form method="post">
      <input name="user" class="form-control mb-3" placeholder="نام کاربری" required>
      <input type="password" name="pass" class="form-control mb-3" placeholder="رمز عبور" required>
      <button class="btn btn-primary w-100">ورود</button>
    </form>
  </div>
</div>

</div>
