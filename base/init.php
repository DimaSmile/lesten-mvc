<?php
session_start();

const TPL_DIR = 'tpl/';
const LGC_DIR = 'logic/';
const MODEL_DIR = 'model/';
const PUBLIC_DIR = 'public/';

require 'base/helpers.php';

require MODEL_DIR . 'model.php';

$_SESSION['messages'] = isset($_SESSION['messages']) ? $_SESSION['messages'] : [];