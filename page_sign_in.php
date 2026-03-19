<?php
require_once('settings.php');
require_once('components/StartComponent.php');
require_once('components/EndComponent.php');
require_once('forms/SignInForm.php');
?>
<?=StartComponent('Sign in')?>
<main class="main_content">
  <?=SignInForm()?>
  <a href="/page_sign_up.php">May be sign up?</a>
</main>
<?=EndComponent()?>