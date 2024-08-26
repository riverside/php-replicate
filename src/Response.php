<?php
namespace PhpReplicate;


class Response
{
    /**
     * @var array
     */
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getBody($format = true)
    {
        return $format ? json_decode($this->response['body'], true) : $this->response['body'];
    }

    public function getError()
    {
        return $this->response['error'];
    }

    public function getHeaders(): array
    {
        return $this->response['headers'];
    }

    public function getHttpCode(): int
    {
        return $this->response['http_code'];
    }

    public function getMethod(): string
    {
        return $this->response['method'];
    }

    public function getUrl(): string
    {
        return $this->response['url'];
    }
}