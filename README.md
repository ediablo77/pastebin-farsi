# pastebin-farsi
     A lightweight Pastebin-like script written in PHP &amp; Bootstrap 5 (Persian RTL)


     # راهنمای نصب Pastebin Pro

این راهنما مراحل نصب اسکریپت Pastebin Pro را روی هاست لینوکس (DirectAdmin) توضیح می‌دهد.

---

## ✅ پیش‌نیازها

- PHP نسخه 7.4 یا بالاتر
- MySQL یا MariaDB
- فعال بودن:
  - PDO
  - PDO_MySQL
- Cron Job (اختیاری ولی پیشنهاد می‌شود)

---

## 🟢 مرحله 1: آپلود فایل‌ها

1. فایل ZIP اسکریپت را استخراج کنید
2. تمام فایل‌ها را داخل مسیر موردنظر آپلود کنید، مثلاً:
public_html/

text

---

## 🟢 مرحله 2: ساخت دیتابیس

در DirectAdmin:

1. وارد **MySQL Management** شوید
2. یک Database بسازید
3. یک User بسازید
4. User را به Database متصل کنید
5. اطلاعات را ذخیره کنید

---

## 🟢 مرحله 3: ایمپورت دیتابیس
پس از ایجاد دیتابیس ، وارد PHPmyadmin بشوید و در بخش SQL کد زیر را وارد کنید و GO را بزنید
در phpMyAdmin این کوئری را اجرا کنید:
```sql
CREATE TABLE pastes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(50) UNIQUE,
  content MEDIUMTEXT,
  password_hash VARCHAR(255) DEFAULT NULL,
  expires_at DATETIME DEFAULT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
