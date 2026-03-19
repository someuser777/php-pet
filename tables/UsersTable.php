<?php
function UsersTable($users) {
  $table_rows = implode('', array_map(
    function ($user) {
      $btn_click = "
      window.location = '/api_delete_user.php?id=$user->id&r=/page_admin_panel.php'
      ";

      return "
        <tr>
          <td class=\"td\">$user->id</td>
          <td class=\"td\">$user->name</td>
          <td class=\"td\">$user->password</td>
          <td class=\"td\">$user->role</td>
          <td class=\"td\">
            <button
              data-testid=\"delete_user_$user->name\"
              onclick=\"$btn_click\"
            >
              Delete
            </button>
          </td>
        </tr>
      ";
    },
    $users,
  ));

  return "
  <h2>Users Table:</h2>
  <table class=\"table\">
    <tr>
      <th class=\"th\">id</th>
      <th class=\"th\">name</th>
      <th class=\"th\">password</th>
      <th class=\"th\">role</th>
      <th class=\"th\">delete</th>
    </tr>
    $table_rows
  </table>
  ";
}
?>