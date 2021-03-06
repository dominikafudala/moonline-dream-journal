<?php

class Dream
{
    private $date;
    private $title;
    private $story;
    private $nightmare;
    private $moonphase;
    private $note;
    private $id = -1;
    private $moods = [];

    public function __construct(
        string $date,
        string $title,
        string $story,
        int    $nightmare,
        int    $moonphase,
        string $note
    ) {
        $this->date = $date;
        $this->title = $title;
        $this->story = $story;
        $this->nightmare = $nightmare;
        $this->moonphase = $moonphase;
        $this->note = $note;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getFormattedDate(): string
    {
        $months = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec"
        ];
        $arrayDate = explode("-", $this->date);
        return $arrayDate[2] . " " . $months[$arrayDate[1] - 1] . " " . $arrayDate[0];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getStory(): string
    {
        return $this->story;
    }

    public function setStory(string $story)
    {
        $this->story = $story;
    }

    public function getNightmare(): int
    {
        return $this->nightmare;
    }

    public function setNightmare(int $nightmare)
    {
        $this->nightmare = $nightmare;
    }


    public function getMoonphase(): int
    {
        return $this->moonphase;
    }

    public function setMoonphase(int $moonphase)
    {
        $this->moonphase = $moonphase;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note)
    {
        $this->note = $note;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function addMood($key, $url)
    {
        $this->moods[] = $key;
        $this->moods[$key] = $url;
    }

    public function getMoods(): array
    {
        return $this->moods;
    }
}
