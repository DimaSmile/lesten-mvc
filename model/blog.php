<?php

$model['blog'] = [];

$create_blog_model = function() use ($conn){
	$functions_array = [
		'save_post' => function($title, $content) use($conn){
						$title = addslashes($title);
						$content = addslashes($content);
						mysqli_query($conn, "INSERT INTO posts(title, content) VALUES('{$title}', '{$content}')");

						return mysqli_error($conn);
						},		
		'update_post' => function($post) use($conn){
						$title = addslashes($post['title']);
						$content = addslashes($post['content']);
						$id = addslashes($post['id']);
						mysqli_query($conn, "UPDATE posts SET title = '{$title}', content= '{$content}' WHERE id = {$id} ");

						return mysqli_error($conn);
						},
		'get_post' => function($id) use($conn){
						$id = addslashes($id);
						return mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM posts WHERE id = {$id}")
							);
						},
		'remove_post' => function($id) use($conn){
						$id = addslashes($id);
						return mysqli_fetch_assoc(mysqli_query($conn, "DELETE FROM posts WHERE id = {$id}")
							);
						},
		'get_last_10_posts' => function() use($conn){
						return mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC LIMIT 10"
							);
						}
	];

	return $functions_array;
};

$model['blog'] = $create_blog_model($conn);
