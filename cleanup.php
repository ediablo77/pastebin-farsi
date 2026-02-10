<?php
require 'config.php';

$pdo->query("
  DELETE FROM pastes
  WHERE expires_at IS NOT NULL
  AND expires_at < NOW()
");
