<?php
namespace PhpReplicate\Tests;


use PhpReplicate\Base;
use PhpReplicate\Request;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function testAttr()
    {
        $attributes = array(
            'request',
        );
        foreach ($attributes as $attribute) {
            $this->assertClassHasAttribute($attribute, Base::class);
        }
    }

    public function testEnv()
    {
        $authToken = getenv('AUTH_TOKEN', true);
        $this->assertNotFalse($authToken);
    }

    public function testRequest()
    {
        $request = new Request(getenv('AUTH_TOKEN'));
        $base = new Base($request);

        $this->assertInstanceOf(Request::class, $base->getRequest());

        $request = new Request(getenv('AUTH_TOKEN'));
        $base->setRequest($request);
        $this->assertInstanceOf(Request::class, $base->getRequest());
    }
}