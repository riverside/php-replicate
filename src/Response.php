<?php
namespace PhpReplicate;


class Response
{
    /**
     * @var array
     */
    protected $response;

    /**
     * Response constructor.
     *
     * @param array $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Get the response
     *
     * @param bool $format
     * @return mixed
     */
    public function getBody($format = true)
    {
        return $format ? json_decode($this->response['body'], true) : $this->response['body'];
    }

    /**
     * Get the error, if any
     *
     * @return mixed
     */
    public function getError()
    {
        return $this->response['error'];
    }

    /**
     * Gets the response headers
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->response['headers'];
    }

    /**
     * Gets the HTTP status code
     *
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->response['http_code'];
    }

    /**
     * Gets the request method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->response['method'];
    }

    /**
     * Gets the requested URL
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->response['url'];
    }
}