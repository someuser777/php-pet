<?php
function render_posts($user, $id_prefix) {
  $posts_json = file_get_contents('storage/posts.json');
  $posts_json_decoded = json_decode($posts_json);

  $posts_json_decoded_filtered = array_filter(
    $posts_json_decoded,
    function ($post) use ($user) {
      return $post->user_id === $user->id;
    },
  );

  if (!count($posts_json_decoded_filtered)) {
    return 'empty';
  }

  return implode(
    '',
    array_map(
      function($post) use($id_prefix) {
        $p_tag_unique_id = $id_prefix.$post->id;
        
        return "
          <div class=\"post\" id=\"$p_tag_unique_id\">
            <div class=\"post_id\">
              <i>post id: <span data-testid=\"post_id\">$post->id</span></i>
            </div>
            <div>
              <b data-testid=\"post_title\">$post->title</b>
            </div>
            <div data-testid=\"post_content\">$post->content</div>
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
            <button
              name=\"edit\"
              data-postid=\"$post->id\"
            >
              Edit
            </button>
            <button
              name=\"delete\"
              data-postid=\"$post->id\"
            >
              Delete
            </button>
          </div>
        ";
      },
      $posts_json_decoded_filtered,
    ),
  );
}
?>