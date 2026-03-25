<?php
require_once('settings.php');
require_once('utils/polyfills.php');
require_once('utils/get_users.php');
require_once('utils/set_users.php');

if ($_GET['id']) {
  $id = $_GET['id'];

  $users = get_users();

  $users_new = array_values(array_filter($users, function ($user) use ($id) {
    return $user->id !== $id;
  }));

  set_users(array_values($users_new));
}

if ($_GET['r']) {
  $redirect = $_GET['r'];
  header("Location: $redirect");
}
?>