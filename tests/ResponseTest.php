<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    protected $error = array(
        'http_code' => 404,
        'error' => "Client error: `GET https://api.replicate.com/v1/models/replicateXXX/hello-world` resulted in a `404 Not Found` response:\n{\"detail\":\"No ModelRedirect matches the given query.\"}",
        'body' => '{"detail":"No ModelRedirect matches the given query."}',
        'headers' => [
            'Content-Type' => ['application/json'],
        ],
        'method' => 'GET',
        'url' => 'https://api.replicate.com/v1/models/replicateXXX/hello-world',
    );

    protected $success = array(
        'http_code' => 200,
        'error' => null,
        'body' => '{"type":"organization","username":"acme","name":"Acme Corp, Inc.","github_url":"https://github.com/acme"}',
        'headers' => [
            'Content-Type' => ['application/json'],
        ],
        'method' => 'GET',
        'url' => 'https://api.replicate.com/v1/account',
    );

    public function testAttr()
    {
        $attributes = array(
            'response',
        );
        foreach ($attributes as $attribute) {
            $this->assertClassHasAttribute($attribute, Response::class);
        }
    }

    public function testJson()
    {
        $this->assertTrue(extension_loaded('json'), 'JSON extension is missing');
    }

    public function testError()
    {
        $response = new Response($this->error);

        $this->assertSame(404, $response->getHttpCode());
        $this->assertNotEmpty($response->getError());
        $this->assertJson($response->getBody(false));
        $this->assertIsArray($response->getBody());
        $this->assertEquals('GET', $response->getMethod());
        $this->assertIsArray($response->getHeaders());
        $this->assertNotEmpty($response->getUrl());
    }

    public function testSuccess()
    {
        $response = new Response($this->success);

        $this->assertSame(200, $response->getHttpCode());
        $this->assertNull($response->getError());
        $this->assertJson($response->getBody(false));
        $this->assertIsArray($response->getBody());
        $this->assertEquals('GET', $response->getMethod());
        $this->assertIsArray($response->getHeaders());
        $this->assertNotEmpty($response->getUrl());
    }
}