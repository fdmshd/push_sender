<?php

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class HelathcheckTest extends WebTestCase
{
    public function test_request_responded_successful_result():void{
        $client = static::createClient();
        $client->request(Request::METHOD_GET, 'healthcheck');

        $this->assertResponseIsSuccessful();
        $jsonResult = json_decode($client->getResponse()->getContent(),true);
        $this->assertEquals($jsonResult['status'], 'ok');
    }
}