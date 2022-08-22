<?php

namespace CircleFortunes;

use CircleFortunes\Helpers\Helpers;
use CircleFortunes\Interfaces\GameInterface;

class Game implements GameInterface
{

    const USER_TRIES_NUMBER = 7;
    private $theWord;
    private $userGuesses = [];

    /**
     * @return mixed
     */
    public function getACharacter($item)
    {
        $this->userGuesses[] = $item;
    }

    /**
     * @return mixed
     */
    public function checkTheCharacter()
    {
        // TODO: Implement checkTheCharacter() method.
    }

    /**
     * @return mixed
     */
    public function pickUpAWord()
    {
        $this->theWord = Helpers::pickUpWordRandomly(rand(1, 10));
    }

    /**
     * @return mixed
     */
    public function showMessage()
    {
        // TODO: Implement showMessage() method.
    }

    /**
     * @return mixed
     */
    public function stateOfGuess()
    {
        // TODO: Implement stateOfGuess() method.
    }

    public function returnTheWord()
    {
        return $this->theWord;
    }
}