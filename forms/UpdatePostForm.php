<?php
function UpdatePostForm($post) {
  return "
  <form method=\"post\" action=\"api_update_post.php\">
    <h2>Edit post $post->id:</h2>
    <input
      type=\"hidden\"
      name=\"id\"
      value=\"$post->id\"
    />
    <input
      type=\"hidden\"
      name=\"user_id\"
      value=\"$post->user_id\"
    />
    <input
      type=\"hidden\"
      name=\"created\"
      value=\"$post->created\"
    />
    <input
      type=\"hidden\"
      name=\"updated\"
      value=\"$post->updated\"
    />
    <label>title:</label>
    <br />
    <input
      type=\"text\"
      name=\"title\"
      placeholder=\"title\"
      value=\"$post->title\"
    />
    <br />
    <label>content:</label>
    <br />
    <input
      type=\"text\"
      name=\"content\"
      placeholder=\"content\"
      value=\"$post->content\"
    />
    <br />
    <br />
    <button name=\"submit\" value=\"submit\">
      Submit
    </button>
  </form>
  ";
}
?>