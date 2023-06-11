<?php 

namespace App\Pusher;

interface PusherFactory {
    public function createPusher(): Pusher;
}