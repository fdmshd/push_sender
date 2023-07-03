<?php

namespace App\MessageHandler;

use App\Message\PushMessage;
use App\Service\PusherService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(fromTransport: 'async')]
class PushMessageHandler
{
    public function __construct(
        private PusherService $pusherService,
    ) {
    }

    public function __invoke(PushMessage $pushMessage)
    {
        $this->pusherService->sendPush($pushMessage);
    }

}