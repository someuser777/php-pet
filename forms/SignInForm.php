<?php
function SignInForm() {
  return "
  <form method=\"post\" action=\"api_sign_in.php\">
    <h1>Sign in</h1>
    <label>Username:</label>
    <br />
    <input type=\"text\" name=\"name\" placeholder=\"Username\" />
    <br />
    <label>Password:</label>
    <br />
    <input type=\"password\" name=\"password\" placeholder=\"Password\" />
    <br />
    <br />
    <button name=\"submit\" value=\"submit\">Submit</button>
  </form>
  ";
}
?>