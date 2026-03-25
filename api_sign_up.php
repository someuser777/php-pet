<?php
require_once('settings.php');
require_once('utils/polyfills.php');
require_once('utils/get_users.php');
require_once('utils/set_users.php');
require_once('utils/set_cookie_user.php');

$users = get_users();

$found_user = array_find($users, function ($user) {
  return $user->name === $_POST['name'];
});

if (!$found_user) {
  $new_user = [
    'id' => ''.time(),
    'name' => $_POST['name'],
    'password' => $_POST['password'],
    'role' => 'customer',
  ];

  set_users([$new_user, ...$users]);
  set_cookie_user($new_user);
}

header('Location: '.($found_user ? '/page_sign_up.php?already_exist='.$_POST['name'] : '/page_main_page.php'));
?>