<?php
$title = 'Some Title';

require('header.php');
require_once('render_posts.php');
?>
<h1>Welcome Page</h1>
<div id="posts">
    <?=render_posts()?>
</div>
<?php
require('footer.php');
?>
