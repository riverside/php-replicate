<?php
namespace PhpReplicate;


class Model extends Base
{
    /**
     * Create a model
     *
     * @param string $owner
     * @param string $name
     * @param string $visibility
     * @param string $hardware
     * @param array $optional
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(string $owner, string $name, string $visibility, string $hardware, array $optional = []): Response
    {
        $data = array_merge($optional, compact('owner', 'name', 'visibility', 'hardware'));

        return $this->request->post('/models', $data);
    }

    /**
     * Delete a model
     *
     * @param string $model_owner
     * @param string $model_name
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $model_owner, string $model_name): Response
    {
        return $this->request->delete("/models/{$model_owner}/{$model_name}");
    }

    /**
     * Delete a model version
     *
     * @param string $model_owner
     * @param string $model_name
     * @param string $version_id
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteVersion(string $model_owner, string $model_name, string $version_id): Response
    {
        return $this->request->delete("/models/{$model_owner}/{$model_name}/versions/{$version_id}");
    }

    /**
     * Get a model
     *
     * @param string $model_owner
     * @param string $model_name
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $model_owner, string $model_name): Response
    {
        return $this->request->get("/models/{$model_owner}/{$model_name}");
    }

    /**
     * Get a model version
     *
     * @param string $model_owner
     * @param string $model_name
     * @param string $version_id
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVersion(string $model_owner, string $model_name, string $version_id): Response
    {
        return $this->request->get("/models/{$model_owner}/{$model_name}/versions/{$version_id}");
    }

    /**
     * List public models
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

        return $this->request->get("/models{$qs}");
    }

    /**
     * Create a prediction using an official model
     *
     * @param string $model_owner
     * @param string $model_name
     * @param array $input
     * @param array $optional
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function prediction(string $model_owner, string $model_name, array $input, array $optional = []): Response
    {
        $data = array_merge($optional, compact('input'));

        return $this->request->post("/models/{$model_owner}/{$model_name}/predictions", $data);
    }

    /**
     * Search public models
     *
     * @param string $keyword
     * @param string|null $cursor
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(string $keyword, string $cursor = null): Response
    {
        $qs = '';
        if ($cursor)
        {
            $qs = "?cursor={$cursor}";
        }

        return $this->request->query("/models{$qs}", $keyword, [
            'Content-Type' => 'text/plain',
        ]);
    }
}