<?php
$pdo = new PDO(
  "mysql:host=localhost;dbname=dbname;charset=utf8mb4",
  "dbusername",
  "dbpassword",
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]
);
