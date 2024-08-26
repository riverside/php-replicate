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
        $request = new Request('test token');
        $webhook = new Webhook($request);
        $response = $webhook->secret();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}