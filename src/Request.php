<?php
namespace PhpReplicate;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Request
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $endPoint = 'https://api.replicate.com/v1';

    /**
     * @var string
     */
    protected $authToken;

    public function __construct($authToken)
    {
        $this->setAuthToken($authToken);

        $this->client = new Client();
    }

    public function getAuthToken()
    {
        return $this->authToken;
    }

    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;

        return $this;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function get($uri, $headers = [])
    {
        return $this->makeRequest('GET', $this->endPoint . $uri, $headers);
    }

    public function post($uri, $data = [], $headers = [])
    {
        return $this->makeRequest('POST', $this->endPoint . $uri, $headers, $data);
    }

    public function delete($uri, $headers = [])
    {
        return $this->makeRequest('DELETE', $this->endPoint . $uri, $headers);
    }

    public function patch($uri, $data, $headers = [])
    {
        return $this->makeRequest('PATCH', $this->endPoint . $uri, $headers, $data);
    }

    public function query($uri, $data, $headers = [])
    {
        return $this->makeRequest('QUERY', $this->endPoint . $uri, $headers, $data);
    }

    protected function makeRequest($method, $url, $headers = [], $data = null) {

        $headers['Authorization'] = 'Bearer ' . $this->authToken;
        $headers['Accept'] = 'application/json';

        // Prepare options with headers
        $options = [
            'headers' => $headers,
            'verify' => false,
        ];

        // For POST requests, add JSON data
        if (strtoupper($method) === 'POST' && $data !== null) {
            $headers['Content-Type'] = 'application/json';
            $options['json'] = $data;
        }

        if (strtoupper($method) === 'QUERY' && $data !== null) {
            $options['query'] = $data;
        }

        try {
            // Send the request
            $response = $this->client->request($method, $url, $options);

            // Get response details
            $statusCode = $response->getStatusCode();
            $responseHeaders = $response->getHeaders();
            $body = $response->getBody()->getContents();

            return new Response([
                'url' => $url,
                'method' => $method,
                'http_code' => $statusCode,
                'headers' => $responseHeaders,
                'body' => $body,
                'error' => null,
            ]);
        } catch (RequestException $e) {
            // Handle any request errors
            return new Response([
                'url' => $url,
                'method' => $method,
                'http_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : null,
                'headers' => $e->hasResponse() ? $e->getResponse()->getHeaders() : [],
                'body' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null,
                'error' => $e->getMessage(),
            ]);
        }
    }
}