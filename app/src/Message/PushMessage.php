<?php

namespace App\Message;

class PushMessage
{
    public function __construct(
        private string $firebaseToken,
        private string $title,
        private string $body
    ) {

    }

    public function getFirebaseToken(): string
    {
        return $this->firebaseToken;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}