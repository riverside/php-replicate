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
        $request = new Request('test token');
        $collection = new Collection($request);
        $response = $collection->get('slug');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }

    public function testList()
    {
        $request = new Request('test token');
        $collection = new Collection($request);
        $response = $collection->list();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertNotEmpty($response->getError());
        $this->assertIsArray($response->getHeaders());
        $this->assertSame('GET', $response->getMethod());
    }
}