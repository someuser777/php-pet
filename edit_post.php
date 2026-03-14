<?php
if (isset($_POST['submit'])) {
  $editing_item = [
    'id' => $_POST['id'],
    'user_id' => $_POST['user_id'],
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'created' => $_POST['created'],
    'updated' => date('Y-m-d H:i:s'),
  ];

  $data_old = file_get_contents('storage/posts.json');
  $data_old_json = json_decode($data_old);

  $found_key = array_find_key(
    $data_old_json,
    function ($item) use ($editing_item) {
      return $item->id === $editing_item['id'];
    },
  );

  $data_old_json[$found_key] = $editing_item;

  $data_new = json_encode($data_old_json);

  file_put_contents('storage/posts.json', $data_new);
}

header('Location: index.php');
?>