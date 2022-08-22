<?php

namespace CircleFortunes;

use CircleFortunes\Interfaces\MessageHandlerInterface;

class MessagesHandler implements MessageHandlerInterface
{
    private  $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function show()
    {
        return $this->message;
    }
}