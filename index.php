<?php
if (!$_COOKIE['user']) {
  header('Location: /sign_in.php');
  exit;
}

$user = json_decode($_COOKIE['user']);

define('POST_ID_PREFIX', 'post_');

$title = 'Some Title';

require('start.php');
require_once('render_posts.php');
?>
<div class="header">
  <div class="header__logo">logo</div>
  <div class="header__user">
    <span><?=$user->name?></span>
    <button
      <?=$user->role === 'admin' ? '' : 'style="display: none"'?>
      onclick="window.location = '/admin.php'"
    >
      Admin Panel
    </button>
    <button onclick="window.location = '/sign_out.php'">
      Sign out
    </button>
  </div>
</div>
<main class="main_content">
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
    <?=render_posts($user, POST_ID_PREFIX)?>
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
    );
  </script>
</main>
<?php
require('end.php');
?>
