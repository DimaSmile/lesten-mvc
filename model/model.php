<?php

$conn = mysqli_connect('localhost', 'root', 'dimasql', 'lesten');

$model = [];

require MODEL_DIR . 'blog.php';

unset($conn);