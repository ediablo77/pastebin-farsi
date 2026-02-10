<?php
require 'config.php';

$slug = $_GET['slug'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM pastes WHERE slug=?");
$stmt->execute([$slug]);
$paste = $stmt->fetch();

if (!$paste) exit('Paste یافت نشد');

$authorized = false;

if (!$paste['password_hash']) {
  $authorized = true;
} elseif ($_POST && password_verify($_POST['password'], $paste['password_hash'])) {
  $authorized = true;
}
?>

<link href="/css/bootstrap.rtl.min.css" rel="stylesheet">

<div class="container py-5" style="max-width:900px">

<?php if (!$authorized): ?>
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h4 class="mb-3">🔐 Paste خصوصی</h4>
      <form method="post" class="mx-auto" style="max-width:300px">
        <input type="password" name="password" class="form-control mb-3" placeholder="رمز عبور" required>
        <button class="btn btn-primary w-100">مشاهده Paste</button>
      </form>
    </div>
  </div>
<?php else: ?>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">📄 محتوای Paste</h5>
    <button class="btn btn-success btn-sm" id="copyBtn">📋 کپی</button>
  </div>

  <div class="card bg-dark text-light shadow-sm">
    <div class="card-body">
      <pre id="codeBox" class="mb-0 text-light" style="white-space:pre-wrap"><?= htmlspecialchars($paste['content']) ?></pre>
    </div>
  </div>

  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="copyToast" class="toast align-items-center text-bg-success border-0">
      <div class="d-flex">
        <div class="toast-body">✅ محتوا کپی شد</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  </div>

<?php endif; ?>

</div>
<?php include 'footer.php'; ?>

<script src="/js/bootstrap.bundle.min.js"></script>
<script>
const btn = document.getElementById('copyBtn');
if (btn) {
  const box = document.getElementById('codeBox');
  const toast = new bootstrap.Toast(document.getElementById('copyToast'));
  btn.onclick = () => {
    navigator.clipboard.writeText(box.innerText).then(() => toast.show());
  };
}
</script>
