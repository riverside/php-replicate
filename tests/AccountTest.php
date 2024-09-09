<?php
declare(strict_types=1);

namespace Riverside\Replicate\Tests;


use Riverside\Replicate\Account;
use Riverside\Replicate\Request;
use Riverside\Replicate\Response;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    public function testGet()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $account = new Account($request);
        $response = $account->get();

        $this->assertInstanceOf(Response::class, $response);
    }
}