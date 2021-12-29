<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('signin', 'DefaultController');
Router::get('signup', 'DefaultController');
Router::get('dreamslist', 'DreamController');
Router::get('dream', 'DefaultController');
Router::get('adddream', 'DefaultController');
Router::post('signin', 'SecurityController');
Router::post('addDream', 'DreamController');

Router::run($path);
