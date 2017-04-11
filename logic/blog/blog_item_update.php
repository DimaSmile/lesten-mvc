<?php 
$additional_templates[] = TPL_DIR . 'blog/post_form.html';
$post = $model['blog']['get_post']($post_data[1]);

$title = $post['title'];
$content = $post['content'];
//If we want to save new post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['content'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$is_ok = TRUE;
	if (strlen($title) > 50) {
		$_SESSION['messages'][] = ['type' => 'warning', 'text' => 'Title is too long'];
		$is_ok = FALSE;
	}
	if (strlen($content) < 3) {
		$_SESSION['messages'][] = ['type' => 'warning', 'text' => 'Content is too short'];
		$is_ok = FALSE;
	}
	if ($is_ok) {
		$post['title'] = $title;
		$post['content'] = $content;
		$save_error = $model['blog']['update_post']($post);
		if ($save_error) {
			$_SESSION['messages'][] = ['type' => 'danger', 'text' => $save_error];
		}else{
			header('Location: /kolyanphp/lesson13/blog/' . $post['id']);
			exit();
		}
	}
}