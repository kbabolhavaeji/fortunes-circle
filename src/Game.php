<?php

namespace CircleFortunes;

use CircleFortunes\Helpers\Helpers;
use CircleFortunes\Interfaces\GameInterface;

class Game implements GameInterface
{

    const USER_TRIES_NUMBER = 7;

    private $theWord;
    private $userGuesses = [];
    private $gameEndFlag = false;

    public function __construct()
    {
        $this->pickUpAWord();
    }

    /**
     * @return View|void
     */
    public function getACharacter($item)
    {
        if (count($this->userGuesses) > self::USER_TRIES_NUMBER) {
            return new View(new MessagesHandler('you lose !'));
        }

        $this->userGuesses[] = $item;
    }

    /**
     * @return mixed
     */
    public function checkTheCharacter()
    {
        $checker = (new CheckItem(end($this->userGuesses), $this->theWord))->check();
        return new View(new MessagesHandler($checker->message));
    }

    /**
     * App choose a word at the start point
     *
     * @return void
     */
    public function pickUpAWord($index = null)
    {
        $picked = $index == null ?: rand(1, 10);
        $this->theWord = Helpers::pickUpWordRandomly($picked);
    }

    /**
     * @return mixed
     */
    public function returnTheWord()
    {
        return $this->theWord;
    }

    /**
     * @return array
     */
    public function returnUserGuesses()
    {
        return $this->userGuesses;
    }
}