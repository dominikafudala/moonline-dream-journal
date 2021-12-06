<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        $this->render('onboarding');
    }

    public function signin()
    {
        $this->render('signin');
    }

    public function signup()
    {
        $this->render('signup');
    }

    public function dreamslist()
    {
        $this->render('dreamslist');
    }

    public function dream()
    {
        $this->render('dream');
    }

    public function adddream()
    {
        $this->render('adddream');
    }
}
