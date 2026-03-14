<?php
  setcookie('user', '', time() - 1);
  header('Location: /sign_in.php');
?>