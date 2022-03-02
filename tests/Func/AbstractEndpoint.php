<?php

namespace App\Tests\Func;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AbstractEndpoint extends WebTestCase
{
    private array $serverInformations = [
        'ACCEPT' =>'application/json',
        'CONTENT_TYPE' => 'application/json'];

    public function getResponseFromRequest(string $method, string $uri, string $payload = ''): Response
    {
        $client = self::createClient();
        #dd(sprintf("$uri%s", '.json'));
        $client->request(
            $method,
            sprintf("$uri%s", '.json'),
            [],
            [],
            $this->serverInformations,
            $payload
        );

        return $client->getResponse();
    }
}