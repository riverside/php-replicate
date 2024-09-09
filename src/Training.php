<?php
declare(strict_types=1);

namespace Riverside\Replicate;

/**
 * Class Training
 * @package Riverside\Replicate
 */
class Training extends Base
{
    /**
     * Cancel a training
     *
     * @param string $training_id
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel(string $training_id): Response
    {
        return $this->request->post("/trainings/{$training_id}/cancel");
    }

    /**
     * Create a training
     *
     * @param string $model_owner
     * @param string $model_name
     * @param string $version_id
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(string $model_owner, string $model_name, string $version_id): Response
    {
        return $this->request->post("/models/{$model_owner}/{$model_name}/versions/{$version_id}/trainings");
    }

    /**
     * Get a training
     *
     * @param string $training_id
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $training_id): Response
    {
        return $this->request->get("/trainings/{$training_id}");
    }

    /**
     * List trainings
     *
     * @param string|null $cursor
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(string $cursor = null): Response
    {
        $qs = '';
        if ($cursor)
        {
            $qs = "?cursor={$cursor}";
        }

        return $this->request->get("/trainings{$qs}");
    }
}