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
        session_start();
        session_write_close();

        if (isset($_SESSION["u"])) {
            $dates = $this->dreamRepository->getDreams();
            return $this->render('dreamslist', ['dates' => $dates]);
        } else {

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }
    }


    public function adddream()
    {

        session_start();
        session_write_close();

        if (isset($_SESSION["u"])) {
            if ($this->isGet()) {
                return $this->render('adddream');
            }

            if ($this->isPost()) {
                $moods = [
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

                $moonphase = $this->dreamRepository->getMoonphaseFromDate($_POST['date']);
                $dream = new Dream($_POST['date'], $_POST['title'], $_POST['story'], $nightmareBool, $moonphase, $_POST['notes']);
                $this->dreamRepository->addDream($dream, $moods);

                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/dreamslist");
                return;
            }
            return $this->render('adddream', []);
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }
    }

    public function date()
    {
        session_start();
        session_write_close();

        if (isset($_SESSION["u"])) {
            $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

            if ($contentType === "application/json") {
                $content = trim(file_get_contents("php://input"));
                $decoded = json_decode($content, true);

                header('Content-type: application/json');
                http_response_code(200);

                echo json_encode($this->dreamRepository->getByDate($decoded['date']));
            }
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }
    }

    public function dream($id)
    {

        session_start();
        session_write_close();

        if (isset($_SESSION["u"])) {
            if (strval($id) == strval(intval($id))) {
                $dream = $this->dreamRepository->getDream($id);
                if (!$dream) {
                    die("Wrong url!");
                    return;
                }
                $moon = $this->dreamRepository->getMoonphaseFromId($dream->getMoonphase());
                $this->render('dream', ['dream' => $dream, 'moon' => $moon]);
            } else {
                die("Wrong url!");
            }
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }
    }

    public function delete($id)
    {
        session_start();
        session_write_close();

        if (isset($_SESSION["u"])) {
            if (strval($id) == strval(intval($id))) {
                $this->dreamRepository->deleteDream($id);
            } else {
                die("Wrong url!");
            }
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }
    }
}
