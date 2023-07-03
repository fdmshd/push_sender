<?php

namespace App\Pusher;

use App\Message\PushMessage;
use Apple\ApnPush\Certificate\Certificate;
use Apple\ApnPush\Model\Notification;
use Apple\ApnPush\Model\DeviceToken;
use Apple\ApnPush\Model\Receiver;
use Apple\ApnPush\Protocol\Http\Authenticator\CertificateAuthenticator;
use Apple\ApnPush\Sender\Builder\Http20Builder;
use Apple\ApnPush\Sender\Sender;

class APNSPusher
{

    private $builder;
    public function __construct()
    {
        $certificate = new Certificate('/path/to/you/certificate.pem', 'pass phrase');
        $authenticator = new CertificateAuthenticator($certificate);
        $this->builder = new Http20Builder($authenticator);
    }

    public function sendPush(PushMessage $pushMessage)
    {
        $protocol = $this->builder->buildProtocol();
        $sender = new Sender($protocol);
        $notification = Notification::createWithBody('Hello ;)');
        $receiver = new Receiver(new DeviceToken('device token'), 'you.app.bundle_id');
        $sender->send($receiver, $notification);
        $protocol->closeConnection();
    }
}