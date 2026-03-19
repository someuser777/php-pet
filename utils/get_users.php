<?php
function get_users() {
  $users_data = file_get_contents(USERS_STORAGE_PATH);
  
  return json_decode($users_data);
}
?>