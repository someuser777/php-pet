<?php
require_once('settings.php');
require_once('utils/get_posts.php');
require_once('utils/check_cookie_user.php');
require_once('utils/get_cookie_user.php');
require_once('components/StartComponent.php');
require_once('components/EndComponent.php');
require_once('components/HeaderComponent.php');
require_once('forms/UpdatePostForm.php');

$user = get_cookie_user();

$editing_post = array_find(get_posts(), function ($post) {
  return $post->id === $_GET['id'];
});
?>
<?=StartComponent('Post Editor')?>
<?=HeaderComponent($user)?>
<main class="main_content">
  <?=UpdatePostForm($editing_post)?>
</main>
<?=EndComponent()?>