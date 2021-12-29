<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Dream.php';
require_once __DIR__ . '/../repository/DreamRepository.php';

class DreamController extends AppController
{

    private $dreamRepository;

    public function __construct()
    {
        parent::__construct();
        $this->dreamRepository = new DreamRepository();
    }

    public function dreamslist()
    {
        $dreams = $this->dreamRepository->getDreams();
        $this->render('dreamslist', ['dreams' => $dreams]);
    }


    public function addDream()
    {

        if ($this->isPost()) {
            $nightmare = $_POST['nightmare'];
            $nightmareBool = false;
            if($nightmare == "yes"){
                $nightmareBool = true;
            }
            $dream = new Dream($_POST['date'], $_POST['title'], $_POST['story'], $nightmareBool , 1, $_POST['notes']);
            $this->dreamRepository->addDream($dream);
            return $this->render('dreamslist', ['messages' => ['Did it'],
                'dreams' => $this->dreamRepository->getDreams()
            ]);
        }
        return $this->render('adddream', ['messages' => ['Nope']]);
    }
}
