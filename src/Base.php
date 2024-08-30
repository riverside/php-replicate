<?php
namespace PhpReplicate;


class Base
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Base constructor.
     *
     * @param Request $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get instance of Request
     *
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * Set instance of Request
     *
     * @param Request $request
     * @return Base
     */
    public function setRequest(Request $request): Base
    {
        $this->request = $request;

        return $this;
    }
}