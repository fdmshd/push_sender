<?php

namespace App\Pusher;
use Kreait\Firebase\Contract\Messaging;


class FirebasePusherFactory implements PusherFactory{

    public function __construct(
        private Messaging $messaging,
        ){

    }
    public function createPusher():Pusher{
        return new FirebasePusher($this->messaging);
    }
}