<?php
declare(strict_types=1);

namespace Riverside\Replicate\Tests;


use Riverside\Replicate\Hardware;
use Riverside\Replicate\Request;
use Riverside\Replicate\Response;
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