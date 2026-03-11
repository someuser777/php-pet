<?php
function render_posts() {
  $posts_json = file_get_contents('./storage/posts.json');
  $posts_json_decoded = json_decode($posts_json);

  function render_post($post) {
    return "
      <p>
        <i>post id: $post->id</i>
        <div><b>$post->title</b></div>
        $post->content
        <div>
          $post->created
          ".(
            $post->updated 
              ? ("
                <i style=\"color: gray\">
                  (upd: $post->updated)
                </i>
                ")
              : ''
          )."
        </div>
      </p>
    ";
  }

  return implode('', array_map('render_post', $posts_json_decoded));
}
?>