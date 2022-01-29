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

    public function calendar()
    {
        session_start();

        session_write_close();

        if (isset($_SESSION["u"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            $this->render('calendar');
        } else {
            $this->render('onboarding');
        }
    }

    public function dreamslist()
    {
        session_start();
        session_write_close();

        if (isset($_SESSION["u"])) {
            $dates = $this->dreamRepository->getDreams();
            $this->render('dreamslist', ['dates' => $dates]);
        } else {
            //TODO: render no permission page or smth like this
            $this->render('onboarding');
        }
    }


    public function adddream()
    {

        if ($this->isGet()) {
            return $this->render('adddream');
        }

        if ($this->isPost()) {
            $moods= [
                "okay" => $_POST['okay'],
                "happy" => $_POST['happy'],
                "excited" => $_POST['excited'],
                "cringe" => $_POST['cringe'],
                "sad" => $_POST['sad'],
                "scared" => $_POST['scared'],
                "confused" => $_POST['confused'],
                "angry" => $_POST['angry']
                ];
            $nightmare = $_POST['nightmare'];
            $nightmareBool = false;
            if ($nightmare == "yes") {
                $nightmareBool = true;
            }
            $dream = new Dream($_POST['date'], $_POST['title'], $_POST['story'], $nightmareBool, 1, $_POST['notes']);
            $this->dreamRepository->addDream($dream, $moods);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dreamslist");
        }
        return $this->render('adddream', []);
    }

    public function date()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->dreamRepository->getByDate($decoded['date']));
        }
    }

    public function dream($id)
    {

        if(strval($id) == strval(intval($id))){
            $dream = $this->dreamRepository->getDream($id);
            if(!$dream){
                //TODO: render not found page
                die("Wrong url!");
            }
            $this->render('dream', ['dream' => $dream]);
        }else{
            //TODO: render not found page
            die("Wrong url!");
        }
    }
}
