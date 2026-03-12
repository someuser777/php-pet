<?php
$title = 'Some Title';

require('header.php');
require_once('render_posts.php');
?>
<h1>Welcome Page</h1>
<h2>Create new post:</h1>
<form name="create_post" method="post" action="create_post.php">
  <label>title:</label>
  <br />
  <input type="text" name="title" placeholder="title" />
  <br />
  <label>content:</label>
  <br />
  <input type="text" name="content" placeholder="content" />
  <br />
  <br />
  <button name="submit" value="submit">
    Submit
  </button>
</form>
<div id="posts">
  <?=render_posts()?>
</div>
<?php
require('footer.php');
?>
