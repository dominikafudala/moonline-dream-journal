<?php

class Dream{
    private $date;
    private $title;
    private $story;
    private $nightmare;
    private $moonphase;
    private $notes;
    public function __construct(string $date,
                                string $title,
                                string $story,
                                string $nightmare,
                                string $moonphase,
                                string $notes)
    {
        $this->date = $date;
        $this->title = $title;
        $this->story = $story;
        $this->nightmare = $nightmare;
        $this->moonphase = $moonphase;
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getStory(): string
    {
        return $this->story;
    }

    /**
     * @param string $story
     */
    public function setStory(string $story)
    {
        $this->story = $story;
    }

    /**
     * @return string
     */
    public function getNightmare(): string
    {
        return $this->nightmare;
    }

    /**
     * @param string $nightmare
     */
    public function setNightmare(string $nightmare)
    {
        $this->nightmare = $nightmare;
    }


    /**
     * @return string
     */
    public function getMoonphase(): string
    {
        return $this->moonphase;
    }

    /**
     * @param string $moonphase
     */
    public function setMoonphase(string $moonphase)
    {
        $this->moonphase = $moonphase;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes)
    {
        $this->notes = $notes;
    }


}
