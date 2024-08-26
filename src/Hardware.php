<?php
namespace PhpReplicate;


class Hardware extends Base
{
    /**
     * List available hardware for models
     *
     * @return Response
     */
    public function list(): Response
    {
        return $this->request->get('/hardware');
    }
}