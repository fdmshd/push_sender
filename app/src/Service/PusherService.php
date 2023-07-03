<?php

namespace App\Service;

use App\Message\PushMessage;
use App\Pusher\FirebasePusher;
use App\Pusher\APNSPusher;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Log\Logger;


class PusherService
{
    public function __construct(
        private FirebasePusher $firebasePusher,
        private APNSPusher $APNSPusher,
        private LoggerInterface $logger
    ) {

    }

    public function sendPush(PushMessage $pushMessage)
    {   
        try {
            $this->firebasePusher->sendPush($pushMessage);
            $this->APNSPusher->sendPush($pushMessage);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }
}