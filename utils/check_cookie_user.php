<?php
if (!$_COOKIE['user']) {
  header('Location: /page_sign_in.php');
  exit;
}
?>