<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Request;
use PhpReplicate\Response;
use PhpReplicate\Webhook;
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