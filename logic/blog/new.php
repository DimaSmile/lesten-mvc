<?php 
$additional_templates[] = TPL_DIR . 'blog/post_form.html';

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
		$save_error = $model['blog']['save_post']($title, $content);
		if ($save_error) {
			$_SESSION['messages'][] = ['type' => 'danger', 'text' => $save_error];
		}else{
			header('Location: /kolyanphp/lesson13/blog');
			exit();
		}
	}
}