<?php

namespace CircleFortunes;

use CircleFortunes\Interfaces\MessageHandlerInterface;

class View
{
    public $hamdler;

    public function __construct(MessageHandlerInterface $messageHandler)
    {
        $this->hamdler = $messageHandler;
    }

    public function show(){
        return $this->hamdler->show();
    }

}
