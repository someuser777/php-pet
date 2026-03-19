<?php
function set_cookie_user($user) {
  setcookie('user', json_encode($user), time() + 1000000);
}
?>