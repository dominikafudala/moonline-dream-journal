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

    public function getDreamsByDate(string $date):array
    {
        $result = [];

        $userID = $this->getUserId();

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.dreams WHERE "userID" = :user AND date = :date ORDER BY "dreamID" DESC;
        ');
        $stmt->bindParam(':user', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $dreams = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    public function getDreams(): array
    {
        $result = [];

        $userID = $this->getUserId();

        $stmt = $this->database->connect()->prepare('
            SELECT date FROM public.dreams WHERE "userID" = :user GROUP BY date ORDER BY date DESC;
        ');


        $stmt->bindParam(':user', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $dates = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dates as $date) {
            $new_date = $date['date'];
            $result[] = $new_date;
            $result[$new_date] = $this->getDreamsByDate($new_date);
        }

        return $result;
    }

    private function getUserId(): int{

        session_start();
        session_write_close();

        $stmt = $this->database->connect()->prepare('
            SELECT "userID" FROM users
            WHERE username = :username
        ');
        $stmt->bindParam(':username', $_SESSION["u"]);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}