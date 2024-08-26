<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Request;
use PhpReplicate\Response;
use PhpReplicate\Training;
use PHPUnit\Framework\TestCase;

class TrainingTest extends TestCase
{
    public function testCancel()
    {
        $request = new Request('test token');
        $training = new Training($request);
        $response = $training->cancel('test training id');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testCreate()
    {
        $request = new Request('test token');
        $training = new Training($request);
        $response = $training->create('model owner', 'model name', 'version id');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request('test token');
        $training = new Training($request);
        $response = $training->get('test training id');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request('test token');
        $training = new Training($request);
        $response = $training->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}