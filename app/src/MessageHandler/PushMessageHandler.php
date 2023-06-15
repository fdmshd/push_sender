<?php

namespace App\MessageHandler;

use App\Message\PushMessage;
use App\Pusher\FirebasePusher;
use Exception;
use Kreait\Firebase\Contract\Messaging;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(fromTransport: 'async')]
class PushMessageHandler
{
    public function __construct(
        private LoggerInterface $logger,
        private Messaging $messaging
    ) {

    }
    public function __invoke(PushMessage $pushMessage)
    {
        $firebasePusher = new FirebasePusher($this->messaging);
        try {
            $firebasePusher->sendPush($pushMessage);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }

}