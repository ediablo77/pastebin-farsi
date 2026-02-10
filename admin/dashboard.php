<?php
session_start();
require '../config.php';

if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}

if (isset($_GET['delete'])) {
  $stmt = $pdo->prepare("DELETE FROM pastes WHERE id=?");
  $stmt->execute([$_GET['delete']]);
  header('Location: dashboard.php');
  exit;
}

$pastes = $pdo->query("SELECT * FROM pastes ORDER BY id DESC")->fetchAll();
?>

<link href="../css/bootstrap.rtl.min.css" rel="stylesheet">

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4>📋 مدیریت Pasteها</h4>
  <a href="logout.php" class="btn btn-outline-danger btn-sm">خروج</a>
</div>

<div class="card shadow-sm">
  <div class="table-responsive">
    <table class="table table-striped mb-0">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Slug</th>
          <th>وضعیت</th>
          <th>تاریخ</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pastes as $p): ?>
        <tr>
          <td><?= $p['id'] ?></td>
          <td>  <a href="../view.php?slug=<?= htmlspecialchars($p['slug']) ?>" 
                       target="_blank" 
                       class="text-decoration-none fw-semibold">
                       <?= htmlspecialchars($p['slug']) ?>
                    </a><?= $p['slug'] ?></td>
          <td><?= $p['password_hash'] ? '🔒 خصوصی' : '🌍 عمومی' ?></td>
          <td><?= $p['created_at'] ?></td>
          <td>
            <a href="?delete=<?= $p['id'] ?>"
               onclick="return confirm('حذف شود؟')"
               class="btn btn-sm btn-danger">حذف</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

</div>
