<?php
require('start.php');

if (isset($_POST['submit'])) {
  $users_data = file_get_contents('storage/users.json');
  $users_data_json = json_decode($users_data);

  $found_user = array_find($users_data_json, function ($user) {
    return (
      $user->name === $_POST['name']
      &&
      $user->password === $_POST['password']
    );
  });

  if ($found_user) {
    setcookie('user', json_encode($found_user), time() + 1000000);
    header('Location: /');
  }
  
  exit;
}
?>
<main class="main_content">
  <h1>Sign in</h1>
  <form name="sign_in" method="post" action="">
    <label>Username:</label>
    <br />
    <input type="text" name="name" placeholder="Username" />
    <br />
    <label>Password:</label>
    <br />
    <input type="password" name="password" placeholder="Password" />
    <br />
    <br />
    <button name="submit" value="submit">Submit</button>
  </form>
</main>
<?php
require('end.php');
?>