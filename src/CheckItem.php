<?php

namespace CircleFortunes;

class CheckItem
{

    private $item;
    private $word;
    public $message;

    public function __construct($item, $word)
    {
        $this->item = $item;
        $this->word = $word;
    }

    public function check()
    {
        if (strlen($this->item) == strlen($this->word) && $this->item === $this->word){
            $this->message = 'you win';
        }elseif (strpos($this->word, $this->item) === false) {
            $this->message = 'wrong guess';
        }

        return $this;
    }




}