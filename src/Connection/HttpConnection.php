<?php

namespace Sockam\PiwikReporting\Connection;

use GuzzleHttp\Client;

class HttpConnection implements ConnectionInterface
{
    private $guzzle;
    private $apiUrl;

    public function __construct($apiUrl, Client $guzzle)
    {
        $this->guzzle = $guzzle;
        $this->apiUrl = $apiUrl;
    }

    public function send(array $params = array())
    {
        $params['module'] = 'API';

        $resp = $this->guzzle->request('GET', $this->apiUrl, [
            'query' => $params,
        ]);

        if (!$resp->getStatusCode() === 200) {
            throw new \Exception('Unable to communicate with Piwik');
        }

        return $resp->getBody();
    }
}
