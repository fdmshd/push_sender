<?php 

namespace App\Pusher;
use App\Message\PushMessage;

interface Pusher
{
    public function push(PushMessage $pushMessage);

}