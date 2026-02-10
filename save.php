<?php
session_start();
require 'config.php';

if ((int)$_POST['captcha'] !== ($_SESSION['captcha'] ?? -1)) {
  exit('❌ کپچا اشتباه است');
}
unset($_SESSION['captcha']);

$content = trim($_POST['content']);
$visibility = $_POST['visibility'];
$password = trim($_POST['password']);
$expire = $_POST['expire'];

$slug = substr(md5(uniqid()), 0, 8);

$passwordHash = null;
if ($visibility === 'private' && $password) {
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);
}

$expiresAt = null;
if ($expire !== 'never') {
  $map = [
    '10m' => '+10 minutes',
    '1h'  => '+1 hour',
    '1d'  => '+1 day'
  ];
  $expiresAt = date('Y-m-d H:i:s', strtotime($map[$expire]));
}

$stmt = $pdo->prepare("
  INSERT INTO pastes (slug, content, password_hash, expires_at)
  VALUES (?, ?, ?, ?)
");
$stmt->execute([$slug, $content, $passwordHash, $expiresAt]);

header("Location: view.php?slug=$slug");
