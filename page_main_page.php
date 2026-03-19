<?php
require_once('settings.php');
require_once('utils/get_posts.php');
require_once('utils/check_cookie_user.php');
require_once('utils/get_cookie_user.php');
require_once('components/StartComponent.php');
require_once('components/EndComponent.php');
require_once('components/Posts.php');
require_once('components/HeaderComponent.php');
require_once('forms/CreatePostForm.php');

$posts = get_posts();
$user = get_cookie_user();
?>
<?=StartComponent('Main Page')?>
<?=HeaderComponent($user)?>
<main class="main_content">
  <h1>Welcome Page</h1>
  <?=CreatePostForm()?>
  <div id="posts"><?=Posts($posts, $user)?></div>
  <script>
    const postsWrapper = document.querySelector('#posts');

    postsWrapper.addEventListener(
      'click',
      function postsWrapperClickHandler(evt) {
        const postId = evt.target.getAttribute('data-postid');

        if (evt.target.name === 'edit') {
          window.location = `/page_post_editor.php?id=${postId}`;
        }
        if (evt.target.name === 'delete') {
          fetch(`/api_delete_post.php?id=${postId}`).then(() => {
            window.location = '';
          });
        }
      },
    );
  </script>
</main>
<?=EndComponent()?>