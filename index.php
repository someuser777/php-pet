<?php
define('POST_ID_PREFIX', 'post_');

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
  <?=render_posts(POST_ID_PREFIX)?>
</div>
<script>
  const postsWrapper = document.querySelector('#posts');

  postsWrapper.addEventListener(
    'click',
    function postsWrapperClickHandler(evt) {
      if (evt.target.name === 'edit') {
        const postId = evt.target.getAttribute('data-postid');
      
        window.location = `/edit_post_form.php?id=${postId}`;
      }
      if (evt.target.name === 'delete') {
        const postId = evt.target.getAttribute('data-postid');

        fetch(`/delete_post.php?id=${postId}`).then(() => {
          window.location = '';
        });
      }
    },
  );</script>
<?php
require('footer.php');
?>
