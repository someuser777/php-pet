<?php
if (!function_exists('array_find')) {
  function array_find(array $array, callable $callback) {
    foreach ($array as $key => $value) {
      if ($callback($value, $key)) {
        return $value;
      }
    }

    return null;
  }
}
if (!function_exists('array_find_key')) {
  function array_find_key(array $array, callable $callback): mixed
  {
    foreach ($array as $key => $value) {
      if ($callback($value, $key)) {
        return $key;
      }
    }

    return null;
  }
}
?>