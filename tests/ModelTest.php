<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Model;
use PhpReplicate\Request;
use PhpReplicate\Response;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function testCreate()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->create('owner', 'name', 'visibility', 'hardware');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testDelete()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->delete('owner', 'name');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('DELETE', $response->getMethod());
    }

    public function testDeleteVersion()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->deleteVersion('owner', 'name', 'version id');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('DELETE', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->get('owner', 'name');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testGetVersion()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->getVersion('owner', 'name', 'version id');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testPrediction()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->prediction('owner', 'name', []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testSearch()
    {
        $request = new Request('test token');
        $model = new Model($request);
        $response = $model->search('test');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('QUERY', $response->getMethod());
    }
}