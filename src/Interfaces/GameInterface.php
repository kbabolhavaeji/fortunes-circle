<?php

namespace CircleFortunes\Interfaces;

interface GameInterface
{
    public function getACharacter($item);

    public function checkTheCharacter();

    public function pickUpAWord($index = null);
}