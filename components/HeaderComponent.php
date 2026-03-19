<?php
function HeaderComponent($user, $is_admin_route = false) {
  $style = $user->role === 'admin' ? '' : 'display: none';
  
  $admin_button_name = $is_admin_route ? 'Return to Main Page' : 'Admin Panel';
  $admin_button_location = $is_admin_route ? '/page_main_page.php' : '/page_admin_panel.php';
  $admin_button_click = "window.location = '$admin_button_location'";

  return "
  <div class=\"header\">
    <div class=\"header__logo\">logo</div>
    <div class=\"header__user\">
      <span>$user->name</span>
      <button style=\"$style\" onclick=\"$admin_button_click\">
        $admin_button_name
      </button>
      <button onclick=\"window.location = '/api_sign_out.php'\">
        Sign out
      </button>
    </div>
  </div>
  ";
}
?>