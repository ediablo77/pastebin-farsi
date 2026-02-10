<?php
session_start();
$a = rand(1,9);
$b = rand(1,9);
$_SESSION['captcha'] = $a + $b;
?>

<!doctype html>
<html lang="fa" dir="rtl">
<meta charset="utf-8">
<!-- Primary Meta Tags -->
<title>Pastebin Pro | اشتراک‌گذاری امن متن و کد</title>
<meta name="description" content="Pastebin Pro یک سرویس حرفه‌ای برای اشتراک‌گذاری متن و کد است. امکان ساخت Paste عمومی و خصوصی، رمز عبور، تاریخ انقضا و لینک مستقیم. طراحی و توسعه توسط ایزی سون.">
<meta name="keywords" content="Pastebin, Pastebin فارسی, اشتراک گذاری کد, paste خصوصی, pastebin pro, paste متن, ایزی سون">
<meta name="robots" content="index, follow">
<meta name="author" content="ایزی سون">
<meta name="language" content="fa">
<meta name="theme-color" content="#0d6efd">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Canonical -->
<link rel="canonical" href="https://paste.adsio.ir/">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://paste.adsio.ir/">
<meta property="og:title" content="Pastebin Pro | اشتراک‌گذاری امن متن و کد">
<meta property="og:description" content="ساخت Paste عمومی و خصوصی با رمز عبور و تاریخ انقضا. سرویس حرفه‌ای Pastebin فارسی.">
<meta property="og:site_name" content="پیست بین فارسی">
<meta property="og:locale" content="fa_IR">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Pastebin Pro | اشتراک‌گذاری امن متن و کد">
<meta name="twitter:description" content="Pastebin فارسی حرفه‌ای برای اشتراک‌گذاری امن متن و کد با لینک مستقیم.">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "پیست بین فارسی",
  "url": "https://your-domain.com/",
  "description": "سرویس اشتراک‌گذاری امن متن و کد با قابلیت Paste خصوصی و تاریخ انقضا",
  "applicationCategory": "DeveloperApplication",
  "operatingSystem": "All",
  "author": {
    "@type": "Organization",
    "name": "ایزی سون"
  }
}
</script>

<link href="/css/bootstrap.rtl.min.css" rel="stylesheet">
<link href="/Vazirmatn-Variable-font-face.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/app.css">

<div class="container py-5" style="max-width:760px">

<h1 class="text-center mb-4">🚀 پیست بین فارسی حرفه ای</h1>

<form method="post" action="save.php">

<div class="mb-4">
  <div class="helper">📝 محتوای Paste</div>
  <textarea name="content" class="form-control code-input" rows="10" required></textarea>
</div>

<div class="mb-4">
  <div class="helper">👁️ نوع Paste</div>
  <select name="visibility" id="visibility" class="form-select">
    <option value="public">عمومی</option>
    <option value="private">خصوصی (با رمز)</option>
  </select>
</div>

<div class="mb-4 d-none" id="passwordBox">
  <div class="helper">🔐 رمز Paste خصوصی</div>
  <input type="password" name="password" class="form-control">
</div>

<div class="mb-4">
  <div class="helper">⏱ زمان انقضا</div>
  <select name="expire" class="form-select">
    <option value="never">♾️ هرگز</option>
    <option value="10m">۱۰ دقیقه</option>
    <option value="1h">۱ ساعت</option>
    <option value="1d">۱ روز</option>
  </select>
</div>

<div class="mb-4">
  <div class="helper">🧠 کپچا (تأیید انسان)</div>
  <div class="input-group">
    <span class="input-group-text"><?= "$a + $b =" ?></span>
    <input type="number" name="captcha" class="form-control" required>
  </div>
</div>

<button class="btn btn-primary w-100">ایجاد Paste</button>

</form>
</div>
<?php include 'footer.php'; ?>

<script src="assets/js/app.js"></script>
