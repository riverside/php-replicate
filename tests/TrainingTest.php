<?php
declare(strict_types=1);

namespace Riverside\Replicate\Tests;


use Riverside\Replicate\Request;
use Riverside\Replicate\Response;
use Riverside\Replicate\Training;
use PHPUnit\Framework\TestCase;

class TrainingTest extends TestCase
{
    public function testCancel()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $training = new Training($request);
        $response = $training->cancel(getenv('TRAINING_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testCreate()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $training = new Training($request);
        $response = $training->create(getenv('MODEL_OWNER'), getenv('MODEL_NAME'), getenv('VERSION_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $training = new Training($request);
        $response = $training->get(getenv('TRAINING_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $training = new Training($request);
        $response = $training->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}