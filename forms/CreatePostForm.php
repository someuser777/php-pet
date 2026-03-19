<?php
function CreatePostForm() {
  return "
  <form method=\"post\" action=\"api_create_post.php\">
    <h2>Create new post:</h2>
    <label>title:</label>
    <br />
    <input type=\"text\" name=\"title\" placeholder=\"title\" />
    <br />
    <label>content:</label>
    <br />
    <input type=\"text\" name=\"content\" placeholder=\"content\" />
    <br />
    <br />
    <button name=\"submit\" value=\"submit\">
      Submit
    </button>
  </form>
  ";
}
?>