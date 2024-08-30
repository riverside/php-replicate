<?php
namespace PhpReplicate;


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