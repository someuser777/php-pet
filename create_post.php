<?php
if (isset($_POST['submit']) && $_POST['content']) {
  $data_old = file_get_contents('storage/posts.json');
  $data_old_json = json_decode($data_old);
  $user = json_decode($_COOKIE['user']);

  $new_item = [
    'id' => ''.time(),
    'user_id' => $user->id,
    'title' => $_POST['title'] ?? '',
    'content' => $_POST['content'],
    'created' => date('Y-m-d H:i:s'),
    'updated' => null,
  ];

  $data_new_json = [$new_item, ...$data_old_json];
  $data_new = json_encode($data_new_json);

  file_put_contents('storage/posts.json', $data_new);
}

header('Location: index.php');
?>