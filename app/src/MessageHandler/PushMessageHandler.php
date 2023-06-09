<?php

namespace App\MessageHandler;
use App\Message\PushMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class PushMessageHandler implements MessageHandlerInterface
{

    public function __invoke(PushMessage $pushMessage)
    {
        print_r('Handler handled the message!');
    }

}