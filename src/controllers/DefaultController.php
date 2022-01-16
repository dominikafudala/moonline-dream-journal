<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        session_start();
        session_write_close();

        if(isset($_SESSION["u"])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dreamslist");
        }else{
            $this->render('onboarding');
        }
    }

    public function dream()
    {
        $this->render('dream');
    }
}
