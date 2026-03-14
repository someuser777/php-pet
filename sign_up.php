<?php
if (isset($_POST['submit'])) {
  $users_old = file_get_contents('storage/users.json');
  $users_old_json = json_decode($users_old);

  $found_user_key = array_find_key($users_old_json, function ($user) {
    return $user->name === $_POST['name'];
  });

  if (!isset($found_user_key)) {
    $new_user = [
      'id' => ''.time(),
      'name' => $_POST['name'],
      'password' => $_POST['password'],
      'role' => 'customer',
    ];

    $users_new_json = [$new_user, ...$users_old_json];
    $users_new = json_encode($users_new_json);
    
    file_put_contents('storage/users.json', $users_new);

    setcookie('user', json_encode($new_user), time() + 1000000);
    header('Location: /');
  } else {
    header('Location: /sign_up.php?already_exist='.$_POST['name']);
  }
  
  exit;
}

require('start.php');
?>
<main class="main_content">
  <h1>Sign up</h1>
  <form id="sign_up" name="sign_up" method="post" action="">
    <label>Username:</label>
    <br />
    <input
      type="text"
      name="name"
      placeholder="Username"
      required
    />
    <br />
    <label>Password:</label>
    <br />
    <input
      type="password"
      name="password"
      placeholder="Password"
      required
    />
    <br />
    <label>Repeat Pasword:</label>
    <br />
    <input
      type="password"
      name="repeat_password"
      placeholder="Repeat Password"
      required
    />
    <br />
    <span id="password_error" style="color: white; display: none">
      Passwords don't match <br />
    </span>
    <?php
      if ($_GET['already_exist']) {
        $forbidden_name = $_GET['already_exist'];
        echo "
          <span style=\"color: gray\">
            $forbidden_name already exist
          </span>
        ";
      }
    ?>
    <br />
    <button name="submit" value="submit">Submit</button>
  </form>
  <a href="/sign_in.php">May be sign in?</a>
</main>
<script>
  const signUpForm = document.querySelector('#sign_up');
  const passwordError = document.querySelector('#password_error');

  signUpForm.addEventListener(
    'submit',
    function signUpSubmitHandler (evt) {
      const password = signUpForm.password.value;
      const repeatPassword = signUpForm.repeat_password.value;

      if (password !== repeatPassword) {
        evt.preventDefault();
        passwordError.style = 'color: gray';
      }
    },
  );
</script>
<?php
require('end.php');
?>