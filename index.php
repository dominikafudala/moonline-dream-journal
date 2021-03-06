<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');


Router::post('signin', 'SecurityController');
Router::post('signup', 'SecurityController');
Router::get('signout', 'SecurityController');

Router::get('dreamslist', 'DreamController');
Router::get('adddream', 'DreamController');
Router::post('addDream', 'DreamController');
Router::post('date', 'DreamController');
Router::get('dream', 'DreamController');
Router::get('delete', 'DreamController');

Router::run($path);
