<?php
if ($_GET['id']) {
  $id = $_GET['id'];

  $data_old = file_get_contents('storage/posts.json');
  $data_old_json = json_decode($data_old);

  $key = array_find_key(
    $data_old_json,
    function ($item) use ($id) {
      return $item->id === $id;
    },
  );

  unset($data_old_json[$key]);

  $data_new_json = array_values($data_old_json);
  $data_new = json_encode($data_new_json);

  file_put_contents('storage/posts.json', $data_new);
}
?>