<?php
require_once('settings.php');
require_once('components/StartComponent.php');
require_once('components/EndComponent.php');
require_once('forms/SignUpForm.php');
?>
<?=StartComponent('Sign up')?>
<main class="main_content">
  <?=SignUpForm($_GET['already_exist'] ?? '')?>
  <a href="/page_sign_in.php">May be sign in?</a>
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
<?=EndComponent()?>