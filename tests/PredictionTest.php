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
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $prediction = new Prediction($request);
        $response = $prediction->cancel(getenv('PREDICTION_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testCreate()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $prediction = new Prediction($request);
        $response = $prediction->create([], getenv('VERSION_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $prediction = new Prediction($request);
        $response = $prediction->get(getenv('PREDICTION_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $prediction = new Prediction($request);
        $response = $prediction->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}