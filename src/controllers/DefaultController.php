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

    public function form_story()
    {
        $this->render('form_story');
    }

    public function form_emotions()
    {
        $this->render('form_emotions');
    }

    public function form_notes()
    {
        $this->render('form_notes');
    }
}
