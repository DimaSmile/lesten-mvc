<?php 
$post = $model['blog']['remove_post']($post_data[1]);

header('Location: /kolyanphp/lesson13/blog' . $post['id']);
exit();
