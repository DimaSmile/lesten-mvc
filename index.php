<?php //Фронт контроллер, mvc, работа с гитом(ветки: переключение, слияние и т.д)
require 'base/init.php';

$additional_templates = [];

switch (TRUE) {
	case preg_match('/\/(|home)$/', $_SERVER['REQUEST_URI']):
		require LGC_DIR . 'home.php';
		break;
	case preg_match('/\/user$/', $_SERVER['REQUEST_URI']):
		require LGC_DIR . 'user/user.php';
		break;
	case preg_match('/\/blog$/', $_SERVER['REQUEST_URI']):
		require LGC_DIR . 'blog/blog.php';
		break;
	case preg_match('/\/blog\/(\w+)$/', $_SERVER['REQUEST_URI'], $post_data):
		require LGC_DIR . 'blog/blog_item.php';
		break;
	case preg_match('/\/blog\/(\w+)\/update$/', $_SERVER['REQUEST_URI'], $post_data):
		require LGC_DIR . 'blog/blog_item_update.php';
		break;
	case preg_match('/\/blog\/(\w+)\/remove$/', $_SERVER['REQUEST_URI'], $post_data):
		require LGC_DIR . 'blog/blog_item_remove.php';
		break;
	case preg_match('/\/blog\/new-post$/', $_SERVER['REQUEST_URI'], $post_data):
		require LGC_DIR . 'blog/new.php';
		break;
	default:
		require LGC_DIR . '404.php';
		break;
}
include TPL_DIR . 'header.html';

foreach ($additional_templates as $template) {
	require $template;
}
include TPL_DIR . 'footer.html';
