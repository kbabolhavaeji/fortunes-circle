<?php

namespace CircleFortunes;

use CircleFortunes\Helpers\Helpers;
use CircleFortunes\Interfaces\GameInterface;

class Game implements GameInterface
{

    const USER_TRIES_NUMBER = 7;

    private $theWord;
    private $userGuesses = [];
    public $gameEndFlag = false;

    public function __construct()
    {
        $this->pickUpAWord();
    }

    /**
     * @return View|void
     */
    public function checkTheGame()
    {
        if($this->gameEndFlag){
            return (new View(new MessagesHandler('game is over')))->show();
        }
    }

    /**
     * @return View|void
     */
    public function getACharacter($item)
    {
        $this->checkTheGame();

        if (count($this->userGuesses) >= self::USER_TRIES_NUMBER) {
            $this->gameEndFlag = true;
            return (new View(new MessagesHandler('you lose')))->show();
        } else {
            $this->userGuesses[] = $item;
        }
    }

    /**
     * @return mixed
     */
    public function checkTheCharacter()
    {
        $checker = (new CheckItem(end($this->userGuesses), $this->theWord, $this->userGuesses))->check();
        if($checker->gameState){
            $this->gameEndFlag = true;
        }
        return (new View(new MessagesHandler($checker->message)))->show();
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