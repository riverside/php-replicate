<?php
namespace PhpReplicate;


class Prediction extends Base
{
    /**
     * Cancel a prediction
     *
     * @param string $prediction_id
     * @return Response
     */
    public function cancel(string $prediction_id): Response
    {
        return $this->request->post("/predictions/{$prediction_id}/cancel");
    }

    /**
     * Create a prediction
     *
     * @param array $input
     * @param string $version
     * @param array $optional
     * @return Response
     */
    public function create(array $input, string $version, array $optional = []): Response
    {
        $data = array_merge($optional, compact('input', 'version'));

        return $this->request->post("/predictions", $data);
    }

    /**
     * Get a prediction
     *
     * @param string $prediction_id
     * @return Response
     */
    public function get(string $prediction_id): Response
    {
        return $this->request->get("/predictions/{$prediction_id}");
    }

    /**
     * List predictions
     *
     * @param string|null $cursor
     * @return Response
     */
    public function list(string $cursor = null): Response
    {
        $qs = '';
        if ($cursor)
        {
            $qs = "?cursor={$cursor}";
        }

        return $this->request->get("/predictions{$qs}");
    }
}