<?php
if (!isset($_COOKIE['user'])) {
  header('Location: /page_sign_in.php');
  exit;
}
?>