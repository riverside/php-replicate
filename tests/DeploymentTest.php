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
        $request = new Request('test token');
        $deployment = new Deployment($request);
        $response = $deployment->create('name', 'model', 'version', 'hardware', 1, 3);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testDelete()
    {
        $request = new Request('test token');
        $deployment = new Deployment($request);
        $response = $deployment->delete('owner', 'name');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('DELETE', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request('test token');
        $deployment = new Deployment($request);
        $response = $deployment->get('owner', 'name');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request('test token');
        $deployment = new Deployment($request);
        $response = $deployment->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testPrediction()
    {
        $request = new Request('test token');
        $deployment = new Deployment($request);
        $response = $deployment->prediction('owner', 'name', []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testUpdate()
    {
        $request = new Request('test token');
        $deployment = new Deployment($request);
        $response = $deployment->update('owner', 'name', []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('PATCH', $response->getMethod());
    }
}