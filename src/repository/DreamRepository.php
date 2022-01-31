<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Dream.php';

class DreamRepository extends Repository
{
    public function getDream(int $id): ?Dream
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.dreams WHERE "dreamID" = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $dream = $stmt->fetch(PDO::FETCH_ASSOC);

        if($this->getUserId() != $dream['userID']){
            return null;
        }

        if ($dream == false) {
            return null;
        }

        $dreamObj = new Dream(
            $dream['date'],
            $dream['title'],
            $dream['story'],
            $dream['nightmare'],
            $dream['moonphaseID'],
            $dream['note']
        );

        $dreamObj->setId($dream['dreamID']);

        $this->getMoods($dreamObj);


        return $dreamObj;
    }

    public function addDream(Dream $dream, $moods):void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.dreams ("userID", date, title, story, nightmare, "moonphaseID", note)
            VALUES (?, ?, ?, ?, ?, ?, ?) returning "dreamID"
        ');

        $userID = $this->getUserId();

        $stmt->execute([
            $userID,
            $dream->getDate(),
            $dream->getTitle(),
            $dream->getStory(),
            $dream->getNightmare(),
            $dream->getMoonphase(),
            $dream->getNote()
        ]);

        $last_id = $stmt->fetch(PDO::FETCH_ASSOC)['dreamID'];
        $this->setMoods($moods, $last_id);

    }

    public function getByDate(string $date)
    {
        $userID = $this->getUserId();

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.dreams WHERE "userID" = :user AND date = :date ORDER BY "dreamID" DESC;
        ');
        $stmt->bindParam(':user', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getDreams(): array
    {
        $result = [];

        $userID = $this->getUserId();

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.dreams WHERE "userID" = :user ORDER BY date DESC, "dreamID" DESC;
        ');
        $stmt->bindParam(':user', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $dreams = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dreamsArray = $this->createDreamsArray($dreams);
        $dates=$this->getAllDatesFromArray($dreamsArray);

        foreach ($dates as $new_date) {
            $result[] = $new_date;
            $result[$new_date] = $this->getDreamsByDateFromArray($dreamsArray, $new_date);
        }

        return $result;
    }

    public function deleteDream($id){

        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.dreams WHERE "dreamID" = :id AND "userID" = :uid;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $uid = $this->getUserId();
        $stmt->bindParam(':uid', $uid , PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getMoonphaseFromDate($date) : int{
        $dateArray = explode("-", $date);
        $y = $dateArray[0];
        $m = $dateArray[1];
        $d = $dateArray[2];

        $phases = ['new_moon', 'waxing_crescent', 'first_quarter', 'waxing_gibbous', 'full_moon', 'waning_gibbous', 'last_quarter', 'waning_crescent'];

        if ($m <= 3) {
            $y--;
            $m += 12;
        }

        $c = 365.25 * $y;
        $e = 30.6 * $m;
        $jd = $c + $e + $d - 694039.09;
        $jd /= 29.5305882;
        $b = intval($jd);
        $jd -= $b;
        $b = round($jd * 8);

        if ($b >= 8) $b = 0;

        $chosenMoon = $phases[$b];

        $stmt = $this->database->connect()->prepare('
            SELECT "moonphaseID" FROM moonphases
            WHERE name = :moon
            limit 1
        ');
        $stmt->bindParam(':moon', $chosenMoon);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getMoonphaseFromId($id): array{
        $stmt = $this->database->connect()->prepare('
            SELECT name, "imgUrl" FROM moonphases
            WHERE "moonphaseID" = :id
            limit 1
        ');

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $moon= $stmt->fetch(PDO::FETCH_ASSOC);
        return [$moon['name'], $moon['imgUrl']];
    }

    private function getUserId(): int{

        session_start();

        $stmt = $this->database->connect()->prepare('
            SELECT "userID" FROM users
            WHERE username = :username
            limit 1
        ');
        $stmt->bindParam(':username', $_SESSION["u"]);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    private function createDreamsArray($dreams):array{
        $result = [];

        foreach ($dreams as $dream) {
            $new_dream = new Dream(
                $dream['date'],
                $dream['title'],
                $dream['story'],
                $dream['nightmare'],
                $dream['moonphaseID'],
                $dream['note']
            );
            $new_dream->setId($dream["dreamID"]);
            $result[] = $new_dream;
        }
        return $result;
    }

    private function getDreamsByDateFromArray($dreamsArray, $date):array{
        $result = [];
        foreach ($dreamsArray as $dream){
            if($dream->getFormattedDate() === $date){
                $result[] = $dream;
            }
        }
        return $result;
    }

    private function getAllDatesFromArray($dreamsArray):array{
        $result = [];
        foreach ($dreamsArray as $dream){
            if(!array_key_exists($dream->getFormattedDate(),$result)){
                $result[] = $dream->getFormattedDate();
            }
        }
        return $result;
    }

    private function setMoods($moods, $last_id){
        $mood_keys = array_keys($moods);
        $moods_on = [];
        foreach ($mood_keys as $key) {
            if ($moods[$key] === "on") {
                $moods_on[] = "'". $key . "'";
            }
        }

        $moods_string = implode(',', $moods_on);
        if($moods_string ===""){
            return;
        }

        $stmt_get_moods = $this->database->connect()->prepare('
            SELECT 
                "moodID" 
            FROM
                public.moods
            WHERE 
                name IN('.$moods_string.')
        ');
        $stmt_get_moods->execute();
        $moods_ids = $stmt_get_moods->fetchAll();

        foreach($moods_ids as $id){
            $res = $id['moodID'];
            $this->insertMoods($res, $last_id);
        }
    }

    private function insertMoods($moodId, $dreamId){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.dreams_moods ("dreamID", "moodID")
            VALUES (?, ?)
        ');

        $stmt->execute([
            $dreamId,
            $moodId
        ]);
    }

    private function getMoods($dream){
        $id = $dream->getId();
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.moods WHERE "moodID" IN 
            (SELECT "moodID" FROM public.dreams_moods WHERE "dreamID" = :id)
        ');
        $stmt->bindParam(':id', $id , PDO::PARAM_INT);
        $stmt->execute();

        $moods = $stmt->fetchAll();
        foreach ($moods as $mood){
            $dream->addMood($mood['name'], $mood['imgUrl']);
        }
    }
}