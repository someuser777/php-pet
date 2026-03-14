<?php
if (!$_COOKIE['user']) {
  header('Location: /sign_in.php');
  exit;
}

$post_id = $_GET['id'];

$posts_data = file_get_contents('storage/posts.json');
$posts_data_json = json_decode($posts_data);

$editing_post = array_find(
  $posts_data_json,
  function ($post) use ($post_id) {
    return $post->id === $post_id;
  },
);

require('start.php');
?>
<div class="header">
  <div class="header__logo">logo</div>
  <div class="header__user">
    <span><?=$user->name?></span>
    <button onclick="window.location = '/sign_out.php'">
      Sign out
    </button>
  </div>
</div>
<main class="main_content">
  <h2>Edit post <?=$editing_post->id?>:</h1>
  <form name="edit_post" method="post" action="edit_post.php">
    <input
      type="hidden"
      name="id"
      value="<?=$editing_post->id?>"
    />
    <input
      type="hidden"
      name="user_id"
      value="<?=$editing_post->user_id?>"
    />
    <input
      type="hidden"
      name="created"
      value="<?=$editing_post->created?>"
    />
    <input
      type="hidden"
      name="updated"
      value="<?=$editing_post->updated?>"
    />
    <label>title:</label>
    <br />
    <input
      type="text"
      name="title"
      placeholder="title"
      value="<?=$editing_post->title?>"
    />
    <br />
    <label>content:</label>
    <br />
    <input
      type="text"
      name="content"
      placeholder="content"
      value="<?=$editing_post->content?>"
    />
    <br />
    <br />
    <button name="submit" value="submit">
      Submit
    </button>
  </form>
</main>
<?php
require('end.php');
?>