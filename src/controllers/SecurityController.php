<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';

class SecurityController extends AppController {

    public function signin()
    {
        $user = new User('username', 'username@mail.com', 'admin');

        if (!$this->isPost()) {
            return $this->render('signin');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $username && $user->getUsername() !== $username) {
            return $this->render('signin', ['messages' => ['User does not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('signin', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dreamslist");
    }
}
