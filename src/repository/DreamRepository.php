<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Dream.php';

class DreamRepository extends Repository
{
    public function getDream(int $id): ?Dream
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.dreams WHERE dreamID = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $dream = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dream == false) {
            return null;
        }

        return new Dream(
            $dream['date'],
            $dream['title'],
            $dream['story'],
            $dream['nightmare'],
            $dream['moonphase'],
            $dream['note']
        );
    }

    public function addDream(Dream $dream):void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.dreams ("userID", date, title, story, nightmare, "moonphaseID", note)
            VALUES (?, ?, ?, ?, ?, ?, ?)
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
            SELECT * FROM public.dreams WHERE "userID" = :user ORDER BY "dreamID" DESC;
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
            if($dream->getDate() === $date){
                $result[] = $dream;
            }
        }
        return $result;
    }

    private function getAllDatesFromArray($dreamsArray):array{
        $result = [];
        foreach ($dreamsArray as $dream){
            if(!array_key_exists($dream->getDate(),$result)){
                $result[] = $dream->getdate();
            }
        }
        return $result;
    }
}