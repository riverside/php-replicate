<?php
declare(strict_types=1);

namespace Riverside\Replicate\Tests;


use Riverside\Replicate\Base;
use Riverside\Replicate\Request;
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