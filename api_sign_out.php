<?php
require_once('settings.php');

setcookie('user', '', time() - 1);
header('Location: /page_sign_in.php');
?>