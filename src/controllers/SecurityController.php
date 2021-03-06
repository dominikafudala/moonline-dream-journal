<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function signin()
    {

        if (!$this->isPost()) {
            session_start();
            session_write_close();
            if (isset($_SESSION["u"])) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/dreamslist");
            } else {
                $this->render('signin');
            }
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userRepository->getUser($username);

            if (!$user) {
                return $this->render('signin', ['messages' => ['User not found!']]);
            }

            if ($user->getEmail() !== $username && $user->getUsername() !== $username) {
                return $this->render('signin', ['messages' => ['User does not exist!']]);
            }

            if (!password_verify($password, $user->getPassword())) {
                return $this->render('signin', ['messages' => ['Wrong password!']]);
            }

            session_start();
            $_SESSION["u"] = $user->getUsername();

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dreamslist");
        }
    }

    public function  signup()
    {
        if (!$this->isPost()) {
            session_start();
            session_write_close();

            if (isset($_SESSION["u"])) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/dreamslist");
                return;
            } else {
                return $this->render('signup');
            }
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];

        if ($password !== $repeatPassword) {
            return $this->render('signup', ['messages' => ['Please provide passwords that match']]);
        }

        $user = new User($username, $email, password_hash($password, PASSWORD_BCRYPT));

        try {
            $this->userRepository->addUser($user);
            return $this->render('signin', ['success' => ['You can now sign in']]);
        } catch (PDOException $exec) {
            return $this->render('signup', ['messages' => ['User with this username or email already exists']]);
        }
    }

    public function signout()
    {
        session_start();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }
}
