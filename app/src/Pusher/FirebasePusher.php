<?php

namespace App\Pusher;

use App\Message\PushMessage;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Exception\Messaging\InvalidMessage;
use Kreait\Firebase\Messaging\CloudMessage;


class FirebasePusher
{

    public function __construct(
        private Messaging $messaging,
    ) {
    }

    public function sendPush(PushMessage $pushMessage)
    {
        $message = CloudMessage::withTarget('token', $pushMessage->getFirebaseToken())
            ->withNotification([
                'title' => $pushMessage->getTitle(),
                'body' => $pushMessage->getBody()
            ])
            ->withDefaultSounds();

        $this->messaging->validate($message);
        $this->messaging->send($message);
    }

}