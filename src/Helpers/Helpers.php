<?php

namespace CircleFortunes\Helpers;

class Helpers
{

    /** @var string[] List of words */
    protected const List = [
        'apple',
        'banana',
        'grapes',
        'orange',
        'pear',
        'lemon',
        'mango',
        'pineapple',
        'lime',
        'coconut'
    ];

    /**
     * @return string[]
     */
    public static function listOfWords()
    {
        return self::List;
    }

    /**
     * pick up word functionality
     *
     * @param $number
     * @return string
     */
    public static function pickUpWordRandomly($number)
    {
        $list = self::listOfWords();
        return $list[$number-1];
    }

    /**
     * User guesses
     *
     * @param $guesses
     * @return int
     */
    public static function countUserGuesses($guesses)
    {
        return count($guesses);
    }

}