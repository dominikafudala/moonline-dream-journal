<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('signin', 'DefaultController');
Router::get('signup', 'DefaultController');
Router::get('dreamslist', 'DefaultController');
Router::get('dream', 'DefaultController');
Router::get('form_story', 'DefaultController');
Router::get('form_emotions', 'DefaultController');
Router::get('form_notes', 'DefaultController');

Router::run($path);
