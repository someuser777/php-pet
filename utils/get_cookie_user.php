<?php
function get_cookie_user() {
  $user = json_decode($_COOKIE['user']);

  return $user;
}
?>