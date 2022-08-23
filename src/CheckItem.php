<?php

namespace CircleFortunes;

class CheckItem
{

    private $item;
    private $word;
    private $guesses;
    public $message;
    public $gameState;

    public function __construct($item, $word, $guesses)
    {
        $this->item = $item;
        $this->word = $word;
        $this->guesses = $guesses;
    }

    public function check()
    {
        if (strlen($this->item) == strlen($this->word) && $this->item === $this->word) {
            $this->message = 'you win';
            $this->gameState = true;
        }elseif(in_array($this->word, $this->guesses)){
            $this->message = 'wrong guess';
        }elseif (strpos($this->word, $this->item) === false) {
            $this->message = 'wrong guess';
        }else{
            $this->message = 'correct';
        }

        if(count($this->guesses) >= 7){
            $this->gameState = true;
        }

        return $this;
    }




}