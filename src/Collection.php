<?php
namespace PhpReplicate;


class Collection extends Base
{
    /**
     * List collections of models
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

        return $this->request->get("/collections{$qs}");
    }

    /**
     * Get a collection of models
     *
     * @param string $collection_slug
     * @return Response
     */
    public function get(string $collection_slug): Response
    {
        return $this->request->get("/collections/{$collection_slug}");
    }
}