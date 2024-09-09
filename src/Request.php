<?php
declare(strict_types=1);

namespace Riverside\Replicate;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Class Request
 * @package Riverside\Replicate
 */
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

    /**
     * Request constructor.
     *
     * @param string $authToken
     */
    public function __construct(string $authToken)
    {
        $this->setAuthToken($authToken);

        $this->client = new Client();
    }

    /**
     * Gets the auth token
     *
     * @return string
     */
    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    /**
     * Sets the auth token
     *
     * @param string $authToken
     * @return Request
     */
    public function setAuthToken(string $authToken): Request
    {
        $this->authToken = $authToken;

        return $this;
    }

    /**
     * Gets the HTTP client
     *
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Make a HTTP GET request
     *
     * @param string $uri
     * @param array $headers
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $headers = []): Response
    {
        return $this->makeRequest('GET', $this->endPoint . $uri, $headers);
    }

    /**
     * Make a HTTP POST request
     *
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $uri, array $data = [], array $headers = []): Response
    {
        return $this->makeRequest('POST', $this->endPoint . $uri, $headers, $data);
    }

    /**
     * Make a HTTP DELETE request
     *
     * @param string $uri
     * @param array $headers
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $uri, array $headers = []): Response
    {
        return $this->makeRequest('DELETE', $this->endPoint . $uri, $headers);
    }

    /**
     * Make a HTTP PATCH request
     *
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function patch(string $uri, array $data, array $headers = []): Response
    {
        return $this->makeRequest('PATCH', $this->endPoint . $uri, $headers, $data);
    }

    /**
     * Make a HTTP QUERY request
     *
     * @param string $uri
     * @param string $data
     * @param array $headers
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function query(string $uri, string $data, array $headers = []): Response
    {
        return $this->makeRequest('QUERY', $this->endPoint . $uri, $headers, $data);
    }

    /**
     * Make an HTTP request
     *
     * @param string $method
     * @param string $url
     * @param array $headers
     * @param string|array|null $data
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function makeRequest(string $method, string $url, array $headers = [], $data = null): Response
    {

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