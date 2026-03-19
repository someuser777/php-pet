<?php
require_once('settings.php');
require_once('utils/get_posts.php');
require_once('utils/set_posts.php');

function update_post($id, $user_id, $title, $content, $created) {
  $editing_post = (object) [
    'id' => $id,
    'user_id' => $user_id,
    'title' => $title,
    'content' => $content,
    'created' => $created,
    'updated' => date('Y-m-d H:i:s'),
  ];

  $posts = get_posts();

  $found_key = array_find_key($posts, function ($post) use ($editing_post) {
    return $post->id === $editing_post->id;
  });

  $posts[$found_key] = $editing_post;

  set_posts($posts);
}

if (isset($_POST['submit'])) {
  update_post(
    $_POST['id'],
    $_POST['user_id'],
    $_POST['title'],
    $_POST['content'],
    $_POST['created'],
  );
  
  header('Location: page_main_page.php');
}
?>