<?php
namespace PhpReplicate;


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