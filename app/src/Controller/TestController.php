<?php

namespace App\Controller;

use App\Message\PushMessage;
use App\Pusher\FirebasePusher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    #[Route('/push', name: 'push_test', methods: 'POST')]
    public function push_test(Request $request, MessageBusInterface $bus): Response
    {
        $decodedRequest = json_decode($request->getContent());

        $message = new PushMessage(
            firebaseToken: $decodedRequest->firebase_token,
            title: $decodedRequest->title,
            body: $decodedRequest->body
        );

        $bus->dispatch($message);

        return new Response('Message was published');
    }

}