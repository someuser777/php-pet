<?php
function SignUpForm($forbidden_name) {
  $forbidden_name_alert = "<span style=\"color: gray\">$forbidden_name already exist</span>";

  return "
  <form id=\"sign_up\" method=\"post\" action=\"api_sign_up.php\">
    <h1>Sign up</h1>
    <label>Username:</label>
    <br />
    <input
      type=\"text\"
      name=\"name\"
      placeholder=\"Username\"
      required
    />
    <br />
    <label>Password:</label>
    <br />
    <input
      type=\"password\"
      name=\"password\"
      placeholder=\"Password\"
      required
    />
    <br />
    <label>Repeat Pasword:</label>
    <br />
    <input
      type=\"password\"
      name=\"repeat_password\"
      placeholder=\"Repeat Password\"
      required
    />
    <br />
    <span id=\"password_error\" style=\"color: white; display: none\">
      Passwords don't match <br />
    </span>
    $forbidden_name_alert
    <br />
    <button name=\"submit\" value=\"submit\">Submit</button>
  </form>
  ";
}
?>