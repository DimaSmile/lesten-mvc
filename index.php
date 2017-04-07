<?php //Фронт контроллер
include 'tpl/header.html';

switch (TRUE) {
	case preg_match_all('/\/(|home)$/', $_SERVER['REQUEST_URI']):
		require 'logic/home.php';
		break;
	case preg_match('/\/blog$/', $_SERVER['REQUEST_URI']):
		require 'logic/blog/blog.php';;
		break;
	default:
		require 'logic/404.php';
		break;
}

include 'tpl/footer.html';