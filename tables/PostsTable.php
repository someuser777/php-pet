<?php
function PostsTable($posts) {
  $table_rows = implode('', array_map(
    function ($post) {
      $btn_click = "window.location = '/api_delete_post.php?id=$post->id&r=/page_admin_panel.php'";

      return "
        <tr>
          <td class=\"td\">$post->id</td>
          <td class=\"td\">$post->user_id</td>
          <td class=\"td\">$post->title</td>
          <td class=\"td\">$post->content</td>
          <td class=\"td\">$post->created</td>
          <td class=\"td\">$post->updated</td>
          <td class=\"td\">
            <button
              data-testid=\"delete_post_$post->id\"
              onclick=\"$btn_click\"
            >
              Delete
            </button>
          </td>
        </tr>
      ";
    },
    $posts,
  ));

  echo "
  <h2>Posts Table:</h2>
  <table class=\"table\">
    <tr>
      <th class=\"th\">id</th>
      <th class=\"th\">user_id</th>
      <th class=\"th\">title</th>
      <th class=\"th\">content</th>
      <th class=\"th\">created</th>
      <th class=\"th\">updated</th>
      <th class=\"th\">delete</th>
    </tr>
    $table_rows
  </table>
  ";
}
?>