<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Dream.php';

class DreamController extends AppController {

    public function addDream()
    {

        if($this->isPost()){
            $dream = new Dream($_POST['date'], $_POST['title'], $_POST['story'], $_POST['nightmare'], "moonphase", $_POST['notes']);
            return $this->render('dreamslist', ['messages' => ['Did it']]);
        }
    }
}
