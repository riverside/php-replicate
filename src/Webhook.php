<?php
declare(strict_types=1);

namespace Riverside\Replicate;

/**
 * Class Webhook
 * @package Riverside\Replicate
 */
class Webhook extends Base
{
    /**
     * Get the signing secret for the default webhook
     *
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function secret(): Response
    {
        return $this->request->get('/webhooks/default/secret');
    }
}