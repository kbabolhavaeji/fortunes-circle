<?php

namespace CircleFortunes\Interfaces;

interface GameInterface
{
    public function getACharacter($item);

    public function checkTheCharacter();

    public function stateOfGuess();

    public function pickUpAWord();

    public function showMessage();
}