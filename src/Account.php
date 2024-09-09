<?php
declare(strict_types=1);

namespace Riverside\Replicate;

/**
 * Class Account
 * @package Riverside\Replicate
 */
class Account extends Base
{
    /**
     * Get the authenticated account
     *
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(): Response
    {
        return $this->request->get('/account');
    }
}