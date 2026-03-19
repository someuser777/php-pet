<?php
function get_posts() {
  $posts_data = file_get_contents(POSTS_STORAGE_PATH);
  
  return json_decode($posts_data);
}
?>