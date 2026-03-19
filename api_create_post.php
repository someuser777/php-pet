<?php
require_once('settings.php');
require_once('utils/get_posts.php');
require_once('utils/set_posts.php');
require_once('utils/get_cookie_user.php');

function create_post($content, $title = '') {
  if ($content) {
    $user = get_cookie_user();

    $new_post = [
      'id' => ''.time(),
      'user_id' => $user->id,
      'title' => $title,
      'content' => $content,
      'created' => date('Y-m-d H:i:s'),
      'updated' => null,
    ];

    set_posts([$new_post, ...get_posts()]);
  }
}

if (isset($_POST['submit'])) {
  create_post($_POST['content'], $_POST['title']);
  header('Location: page_main_page.php');
}
?>