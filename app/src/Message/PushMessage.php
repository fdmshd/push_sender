<?php

namespace App\Message;

class PushMessage
{
    public function __construct(
        private string $firebaseToken,
        private string $apnsToken,
        private string $title,
        private string $subtitle,
        private string $body,
        private array $customData,
    ) {

    }

    public function getFirebaseToken(): string
    {
        return $this->firebaseToken;
    }

    public function getApnsToken(): string
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

    public function getCustomData(): array
    {
        return $this->customData;
    }
}