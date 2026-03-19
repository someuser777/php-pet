<?php
require_once('settings.php');
require_once('utils/get_users.php');
require_once('utils/set_cookie_user.php');

$users = get_users();

$found_user = array_find($users, function ($user) {
  return (
    $user->name === $_POST['name']
    &&
    $user->password === $_POST['password']
  );
});

if ($found_user) {
  set_cookie_user($found_user);
}

header('Location: '.($found_user ? '/page_main_page.php' : '/page_sign_in.php'));
?>