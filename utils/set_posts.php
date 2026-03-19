<?php
function set_posts($posts) {
  $posts_encoded = json_encode($posts);
  
  file_put_contents(POSTS_STORAGE_PATH, $posts_encoded);
}
?>