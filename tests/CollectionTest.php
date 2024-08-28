<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Collection;
use PhpReplicate\Request;
use PhpReplicate\Response;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testGet()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $collection = new Collection($request);
        $response = $collection->get(getenv('COLLECTION_SLUG'));

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $collection = new Collection($request);
        $response = $collection->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertIsString($response->getUrl());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}