<?php
function Posts($posts, $user) {
  $posts_filtered = array_values(array_filter(
    $posts,
    function ($post) use ($user) {
      return $post->user_id === $user->id;
    },
  ));

  if (!count($posts_filtered)) {
    return 'empty';
  }

  return implode(
    '',
    array_map(
      function($post) {
        $p_tag_unique_id = POST_ID_PREFIX.$post->id;
        $html_date_updated = (
          $post->updated
            ? "<i style=\"color: gray\">(upd: $post->updated)</i>"
            : ''
        );

        return "
          <div class=\"post\" id=\"$p_tag_unique_id\">
            <div class=\"post_id\">
              <i>post id: <span data-testid=\"post_id\">$post->id</span></i>
            </div>
            <div>
              <b data-testid=\"post_title\">$post->title</b>
            </div>
            <div data-testid=\"post_content\">$post->content</div>
            <div>$post->created$html_date_updated</div>
            <button name=\"edit\" data-postid=\"$post->id\">
              Edit
            </button>
            <button name=\"delete\" data-postid=\"$post->id\">
              Delete
            </button>
          </div>
        ";
      },
      $posts_filtered,
    ),
  );
}
?>