<?php
function set_users($users) {
  $users_encoded = json_encode($users);
  
  file_put_contents(USERS_STORAGE_PATH, $users_encoded);
}
?>