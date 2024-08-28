<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Request;
use PhpReplicate\Response;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testSuccess()
    {
        $attributes = array(
            'client',
            'endPoint',
            'authToken',
        );
        foreach ($attributes as $attribute) {
            $this->assertClassHasAttribute($attribute, Request::class);
        }
    }

    public function testCurl()
    {
        $this->assertTrue(extension_loaded('curl'), 'cURL extension is missing');
    }

    public function testToken()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $this->assertIsString($request->getAuthToken());
        $this->assertEquals($request->getAuthToken(), getenv('AUTH_TOKEN'));

        $request->setAuthToken(getenv('AUTH_TOKEN'));
        $this->assertIsString($request->getAuthToken());
        $this->assertEquals($request->getAuthToken(), getenv('AUTH_TOKEN'));
    }

    public function testClient()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $this->assertInstanceOf(Client::class, $request->getClient());
    }

    public function testVerbs()
    {
        $request = new Request(getenv('AUTH_TOKEN'));

        $response = $request->get('/test');
        $this->assertInstanceOf(Response::class, $response);

        $response = $request->post('/test');
        $this->assertInstanceOf(Response::class, $response);

        $response = $request->delete('/test');
        $this->assertInstanceOf(Response::class, $response);

        $response = $request->patch('/test', []);
        $this->assertInstanceOf(Response::class, $response);

        $response = $request->query('/test', []);
        $this->assertInstanceOf(Response::class, $response);
    }
}