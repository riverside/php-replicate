<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Hardware;
use PhpReplicate\Request;
use PhpReplicate\Response;
use PHPUnit\Framework\TestCase;

class HardwareTest extends TestCase
{
    public function testList()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $hardware = new Hardware($request);
        $response = $hardware->list();

        $this->assertInstanceOf(Response::class, $response);
    }
}