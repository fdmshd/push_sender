<?php

namespace App\Controller;

use App\Message\PushMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    #[Route('/sample', name: 'sample')]
    public function sample(MessageBusInterface $bus): Response
    {
        $message = new PushMessage('content');
        $bus->dispatch($message);

        return new Response(sprintf('Message with content %s was published', $message->getContent()));
    }
}