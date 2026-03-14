<?php
if (!$_COOKIE['user']) {
  header('Location: /sign_in.php');
  exit;
}

$users_data = file_get_contents('storage/users.json');
$users_json = json_decode($users_data);

$posts_data = file_get_contents('storage/posts.json');
$posts_json = json_decode($posts_data);

require('start.php');
?>
<div class="header">
  <div class="header__logo">logo</div>
  <div class="header__user">
    <span><?=$user->name?></span>
    <button onclick="window.location = '/index.php'">
      Return to Main Page
    </button>
    <button onclick="window.location = '/sign_out.php'">
      Sign out
    </button>
  </div>
</div>
<main class="main_content">
  <h1>Admin Page</h1>
  <hr />
  <h2>Users:</h2>
  <table class="table">
    <tr>
      <th class="th">id</th>
      <th class="th">name</th>
      <th class="th">password</th>
      <th class="th">role</th>
      <th class="th">delete</th>
    </tr>
    <?php
      echo implode('', array_map(
        function ($user) {
          $btn_click = trim("
          window.location = '/delete_user.php?id=$user->id&r=/admin.php';
          ");

          return "
            <tr>
              <td class=\"td\">$user->id</td>
              <td class=\"td\">$user->name</td>
              <td class=\"td\">$user->password</td>
              <td class=\"td\">$user->role</td>
              <td class=\"td\">
                <button onclick=\"$btn_click\">
                  Delete
                </button>
              </td>
            </tr>
          ";
        },
        $users_json,
      ));
    ?>
  </table>
  <hr />
  <h2>Posts:</h2>
  <table class="table">
    <tr>
      <th class="th">id</th>
      <th class="th">user_id</th>
      <th class="th">title</th>
      <th class="th">content</th>
      <th class="th">created</th>
      <th class="th">updated</th>
      <th class="th">delete</th>
    </tr>
    <?php
      echo implode('', array_map(
        function ($post) {
          $btn_click = trim("
          window.location = '/delete_post.php?id=$post->id&r=/admin.php';
          ");
          return "
            <tr>
              <td class=\"td\">$post->id</td>
              <td class=\"td\">$post->user_id</td>
              <td class=\"td\">$post->title</td>
              <td class=\"td\">$post->content</td>
              <td class=\"td\">$post->created</td>
              <td class=\"td\">$post->updated</td>
              <td class=\"td\">
                <button onclick=\"$btn_click\">
                  Delete
                </button>
              </td>
            </tr>
          ";
        },
        $posts_json,
      ));
    ?>
  </table>
</main>
<?php
require('end.php');
?>