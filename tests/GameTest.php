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
    public function test_list_of_words_exists()
    {
        $list = Helpers\Helpers::listOfWords();
        $this->assertIsArray($list);
    }

    /**
     * Test for system word pick up
     *
     * @return void
     */
    public function test_pick_up_word_randomly_helper_works_correctly()
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

    /**
     * User can send a character
     *
     * @return void
     */
    public function test_user_can_guess_a_character()
    {
        $game = new Game();
        $game->getACharacter('a');

        $this->assertContains('a', $game->returnUserGuesses());
    }

    /**
     * Check user guesses count
     *
     * @return void
     */
    public function test_user_can_not_have_more_than_seven_guesses()
    {
        $game = new Game();
        $game->pickUpAWord(0); // apple
        $list = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'I'];

        for($i = 0; $i < Game::USER_TRIES_NUMBER; $i++){
            $game->getACharacter($list[$i]);
        }

        $this->assertCount(Game::USER_TRIES_NUMBER, $game->returnUserGuesses());
    }

    /**
     * user can have seven wrong guess
     *
     * @return void
     */
    public function test_game_should_ends_after_seven_guess()
    {
        $game = new Game();
        $game->pickUpAWord(0); // apple
        $list = ['n', 'm', 'c', 'd', 's', 'x', 'g'];

        for($i = 0; $i < Game::USER_TRIES_NUMBER; $i++){
            $game->getACharacter($list[$i]);
            var_dump($list[$i], $game->checkTheCharacter());
        }

        echo count($game->returnUserGuesses());

        $this->assertEquals(true, $game->gameEndFlag);
    }

    public function test_game_should_not_ends_on_less_than_seven_wrong_guess()
    {
        $game = new Game();
        $list = ['n', 'm', 'c', 'd', 's', 'x'];

        for($i = 0; $i < 6; $i++){
            $game->getACharacter($list[$i]);
            var_dump($list[$i], $game->checkTheCharacter());
        }

        echo count($game->returnUserGuesses());

        $this->assertEquals(false, $game->gameEndFlag);
    }

    /**
     * Correct guess
     *
     * @return void
     */
    public function test_if_user_guess_a_character()
    {
        $game = new Game();
        $userGuess = 'a';

        $game->pickUpAWord(0); // apple
        $this->assertStringContainsString($userGuess, $game->returnTheWord());
    }

    /**
     * Check if user can guess the whole word
     *
     * @return void
     */
    public function test_user_can_guess_the_whole_word()
    {
        $game = new Game();
        $game->pickUpAWord(0); // apple
        $game->getACharacter('apple');

        $this->assertEquals('you win', $game->checkTheCharacter());
    }

    /**
     * check if user can guess a character correctly
     *
     * @return void
     */
    public function test_if_user_guess_a_character_correctly()
    {
        $game = new Game();
        $game->pickUpAWord(0); // apple
        $game->getACharacter('e');

        $this->assertEquals('correct', $game->checkTheCharacter());
    }

    /**
     * check if user can guess a character incorrectly
     *
     * @return void
     */
    public function test_if_user_guess_a_character_incorrectly()
    {
        $game = new Game();
        $game->pickUpAWord(0); // apple
        $game->getACharacter('x');

        $this->assertEquals('wrong guess', $game->checkTheCharacter());
    }



}