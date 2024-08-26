<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Account;
use PhpReplicate\Request;
use PhpReplicate\Response;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    public function testGet()
    {
        $request = new Request('test token');
        $account = new Account($request);
        $response = $account->get();

        $this->assertInstanceOf(Response::class, $response);
    }
}