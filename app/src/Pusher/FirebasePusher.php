<?php

namespace App\Pusher;

use App\Message\PushMessage;
use Exception;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Exception\Messaging\InvalidMessage;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\CloudMessage;
use Psr\Log\LoggerInterface;

class FirebasePusher implements Pusher
{

    public function __construct(
        private Messaging $messaging,
    ) {

    }

    public function push(PushMessage $pushMessage)
    {
        $message = CloudMessage::withTarget('token', $pushMessage->getFirebaseToken())
            ->withNotification([
                'title' => $pushMessage->getTitle(),
                'body' => $pushMessage->getBody()
            ])
            ->withDefaultSounds();

        try {
            $this->messaging->validate($message);
        } catch (InvalidMessage $e) {
            throw $e;
        }

        $this->messaging->send($message);
    }

}