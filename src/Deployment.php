<?php
declare(strict_types=1);

namespace Riverside\Replicate;

/**
 * Class Deployment
 * @package Riverside\Replicate
 */
class Deployment extends Base
{
    /**
     * Create a deployment
     *
     * @param string $name
     * @param string $model
     * @param string $version
     * @param string $hardware
     * @param int $min_instances
     * @param int $max_instances
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(string $name, string $model, string $version, string $hardware, int $min_instances, int $max_instances): Response
    {
        $data = compact('name', 'model', 'version', 'hardware', 'min_instances', 'max_instances');

        return $this->request->post('/deployments', $data);
    }

    /**
     * Delete a deployment
     *
     * @param string $deployment_owner
     * @param string $deployment_name
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $deployment_owner, string $deployment_name): Response
    {
        return $this->request->delete("/deployments/{$deployment_owner}/{$deployment_name}");
    }

    /**
     * Get a deployment
     *
     * @param string $deployment_owner
     * @param string $deployment_name
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $deployment_owner, string $deployment_name): Response
    {
        return $this->request->get("/deployments/{$deployment_owner}/{$deployment_name}");
    }

    /**
     * List deployments
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

        return $this->request->get("/deployments{$qs}");
    }

    /**
     * Create a prediction using a deployment
     *
     * @param string $deployment_owner
     * @param string $deployment_name
     * @param array $input
     * @param array $optional
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function prediction(string $deployment_owner, string $deployment_name, array $input, array $optional = []): Response
    {
        $data = array_merge($optional, compact('input'));

        return $this->request->post("/deployments/{$deployment_owner}/{$deployment_name}/predictions", $data);
    }

    /**
     * Update a deployment
     *
     * @param string $deployment_owner
     * @param string $deployment_name
     * @param array $data
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(string $deployment_owner, string $deployment_name, array $data): Response
    {
        return $this->request->patch("/deployments/{$deployment_owner}/{$deployment_name}", $data);
    }
}