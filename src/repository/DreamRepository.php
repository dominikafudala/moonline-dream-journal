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

        $userID = 1;

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


    public function getDreams(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.dreams WHERE "userID" = 1;
        ');
        $stmt->execute();
        $dreams = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dreams as $dream) {
            $result[] = new Dream(
                $dream['date'],
                $dream['title'],
                $dream['story'],
                $dream['nightmare'],
                $dream['moonphaseID'],
                $dream['note']
            );
        }

        return $result;
    }
}