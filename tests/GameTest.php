<?php


namespace Tests;

use CircleFortunes\Game;
use PHPUnit\Framework\TestCase;
use CircleFortunes\Helpers;

class GameTest extends TestCase
{
    /**
     * Test for list of system words for guess being exist.
     *
     * @return void
     */
    public function test_list_of_words_exist()
    {
        $list = Helpers\Helpers::listOfWords();
        $this->assertIsArray($list);
    }

    /**
     * Test for system word pick up
     *
     * @return void
     */
    public function test_pick_up_word_randomly_helper()
    {
        $word = Helpers\Helpers::pickUpWordRandomly(rand(1, 10));
        $this->assertIsString($word);
    }

    /**
     * Can system pick up a word ?
     *
     * @return void
     */
    public function test_system_can_pick_up_word_randomly()
    {
        $game = new Game();
        $game->pickUpAWord();
        $this->assertIsString($game->returnTheWord());
    }

    public function test_user_can_send_character()
    {
        $game = new Game();
        $game->getACharacter('a');

        //$this->
    }
}