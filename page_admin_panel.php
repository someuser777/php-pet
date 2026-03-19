<?php
require_once('settings.php');
require_once('utils/get_users.php');
require_once('utils/get_posts.php');
require_once('utils/check_cookie_user.php');
require_once('utils/get_cookie_user.php');
require_once('components/StartComponent.php');
require_once('components/EndComponent.php');
require_once('components/HeaderComponent.php');
require_once('tables/UsersTable.php');
require_once('tables/PostsTable.php');

$user = get_cookie_user();

if ($user->role !== 'admin') {
  header('Location: /page_sign_in.php');
  exit;
}

$users = get_users();
$posts = get_posts();
?>
<?=StartComponent('Admin Panel')?>
<?=HeaderComponent($user, true)?>
<main class="main_content">
  <h1>Admin Page</h1>
  <hr />
  <?=UsersTable($users)?>
  <hr />
  <?=PostsTable($posts)?>
</main>
<?=EndComponent()?>