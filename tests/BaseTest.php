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

    public function testRequest()
    {
        $request = new Request('test token');
        $base = new Base($request);

        $this->assertInstanceOf(Request::class, $base->getRequest());

        $request = new Request('new token');
        $base->setRequest($request);
        $this->assertInstanceOf(Request::class, $base->getRequest());
    }
}