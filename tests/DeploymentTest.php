<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Deployment;
use PhpReplicate\Request;
use PhpReplicate\Response;
use PHPUnit\Framework\TestCase;

class DeploymentTest extends TestCase
{
    public function testCreate()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $deployment = new Deployment($request);
        $response = $deployment->create(getenv('DEPLOYMENT_NAME'), getenv('MODEL_NAME'), getenv('VERSION_ID'),
            getenv('HARDWARE'), getenv('MIN_INSTANCES'), getenv('MAX_INSTANCES'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testDelete()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $deployment = new Deployment($request);
        $response = $deployment->delete(getenv('DEPLOYMENT_OWNER'), getenv('DEPLOYMENT_NAME'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('DELETE', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $deployment = new Deployment($request);
        $response = $deployment->get(getenv('DEPLOYMENT_OWNER'), getenv('DEPLOYMENT_NAME'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $deployment = new Deployment($request);
        $response = $deployment->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testPrediction()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $deployment = new Deployment($request);
        $response = $deployment->prediction(getenv('DEPLOYMENT_OWNER'), getenv('DEPLOYMENT_NAME'), []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testUpdate()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $deployment = new Deployment($request);
        $response = $deployment->update(getenv('DEPLOYMENT_OWNER'), getenv('DEPLOYMENT_NAME'), []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('PATCH', $response->getMethod());
    }
}