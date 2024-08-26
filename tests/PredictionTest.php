<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Request;
use PhpReplicate\Response;
use PhpReplicate\Prediction;
use PHPUnit\Framework\TestCase;

class PredictionTest extends TestCase
{
    public function testCancel()
    {
        $request = new Request('test token');
        $prediction = new Prediction($request);
        $response = $prediction->cancel('test prediction id');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testCreate()
    {
        $request = new Request('test token');
        $prediction = new Prediction($request);
        $response = $prediction->create([], 'version');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request('test token');
        $prediction = new Prediction($request);
        $response = $prediction->get('test prediction id');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request('test token');
        $prediction = new Prediction($request);
        $response = $prediction->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}