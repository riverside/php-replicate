<?php
declare(strict_types=1);

namespace Riverside\Replicate\Tests;


use Riverside\Replicate\Request;
use Riverside\Replicate\Response;
use Riverside\Replicate\Webhook;
use PHPUnit\Framework\TestCase;

class WebhookTest extends TestCase
{
    public function testSecret()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $webhook = new Webhook($request);
        $response = $webhook->secret();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}