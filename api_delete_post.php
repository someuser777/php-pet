<?php
require_once('settings.php');
require_once('utils/get_posts.php');
require_once('utils/set_posts.php');

function delete_post($id, $redirect = '') {
  if ($id) {
    $posts = get_posts();

    $posts_new = array_values(array_filter($posts, function ($post) use ($id) {
      return $post->id !== $id;
    }));

    set_posts($posts_new);
  }

  if ($redirect) {
    header("Location: $redirect");
  }
}

delete_post($_GET['id'], $_GET['r']);
?>