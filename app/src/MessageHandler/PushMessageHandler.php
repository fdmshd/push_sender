<?php

namespace App\MessageHandler;

use App\Message\PushMessage;
use App\Pusher\FirebasePusherFactory;
use Kreait\Firebase\Exception\Messaging\InvalidMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class PushMessageHandler implements MessageHandlerInterface
{
    public function __construct(
        private FirebasePusherFactory $firebasePusherFactory,
        private LoggerInterface $logger
    ) {

    }
    public function __invoke(PushMessage $pushMessage)
    {
        $firebasePusher = $this->firebasePusherFactory->createPusher();
        
        try {
            $firebasePusher->push($pushMessage);
        } catch (InvalidMessage $e) {
           $this->logger->error($e->getMessage());
        }
    }

}