<?php
require_once('settings.php');
require_once('utils/set_users.php');
require_once('utils/set_posts.php');

define(
  'DEFAULT_USERS',
  [
    ['id' => '1', 'name' => 'admin', 'password' => 'admin', 'role' => 'admin'],
    ['id' => '2', 'name' => 'Some_user', 'password' => '1234', 'role' => 'customer'],
  ],
);
define(
  'DEFAULT_POSTS',
  [
    [
      'id' => '1',
      'user_id' => '1',
      'title' => 'Some title',
      'content' => 'lorem ipsum dolor',
      'created' => '2026-01-01 12:26:37',
      'updated' => null,
    ],
    [
      'id' => '2',
      'user_id' => '2',
      'title' => 'Some title updated',
      'content' => 'lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor',
      'created' => '2026-02-01 15:36:37',
      'updated' => '2026-03-04 15:47:37',
    ],
    [
      'id' => '3',
      'user_id' => '2',
      'title' => 'Some title updated',
      'content' => 'lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor',
      'created' => '2026-03-01 15:36:37',
      'updated' => null,
    ],
  ],
);

set_users(DEFAULT_USERS);
set_posts(DEFAULT_POSTS);
?>