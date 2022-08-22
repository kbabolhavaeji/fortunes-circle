<?php

namespace CircleFortunes;

use CircleFortunes\Interfaces\MessageHandlerInterface;

class View
{

    public function __construct(MessageHandlerInterface $messageHandler)
    {
        return $messageHandler->show();
    }

}
