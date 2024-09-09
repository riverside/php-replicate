<?php
declare(strict_types=1);

namespace Riverside\Replicate\Tests;


use Riverside\Replicate\Model;
use Riverside\Replicate\Request;
use Riverside\Replicate\Response;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function testCreate()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $model = new Model($request);
        $response = $model->create(getenv('MODEL_OWNER'), getenv('MODEL_NAME'), getenv('VISIBILITY'),
            getenv('HARDWARE'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testDelete()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $model = new Model($request);
        $response = $model->delete(getenv('MODEL_OWNER'), getenv('MODEL_NAME'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('DELETE', $response->getMethod());
    }

    public function testDeleteVersion()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $model = new Model($request);
        $response = $model->deleteVersion(getenv('MODEL_OWNER'), getenv('MODEL_NAME'), getenv('VERSION_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('DELETE', $response->getMethod());
    }

    public function testGet()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $model = new Model($request);
        $response = $model->get(getenv('MODEL_OWNER'), getenv('MODEL_NAME'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testGetVersion()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $model = new Model($request);
        $response = $model->getVersion(getenv('MODEL_OWNER'), getenv('MODEL_NAME'), getenv('VERSION_ID'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $model = new Model($request);
        $response = $model->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testPrediction()
    {
        $request = new Request(getenv('AUTH_TOKEN_FOR_WRITE'));
        $model = new Model($request);
        $response = $model->prediction(getenv('MODEL_OWNER'), getenv('MODEL_NAME'), []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('POST', $response->getMethod());
    }

    public function testSearch()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $model = new Model($request);
        $response = $model->search(getenv('SEARCH_QUERY'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('QUERY', $response->getMethod());
    }
}