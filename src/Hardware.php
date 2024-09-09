<?php
declare(strict_types=1);

namespace Riverside\Replicate;

/**
 * Class Hardware
 * @package Riverside\Replicate
 */
class Hardware extends Base
{
    /**
     * List available hardware for models
     *
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(): Response
    {
        return $this->request->get('/hardware');
    }
}