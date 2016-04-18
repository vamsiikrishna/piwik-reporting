<?php

namespace Sockam\PiwikReporting;

use Sockam\PiwikReporting\Connection\ConnectionInterface;

class Client
{
    private $connection;
    private $token;

    public function __construct(ConnectionInterface $connection, $token)
    {
        $this->connection = $connection;
        $this->setToken($token);
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function call($method, $params = array(), $format = 'PHP')
    {
        $params['method'] = $method;
        $params['token_auth'] = $this->token;
        $params['format'] = $format;

        $resp = $this->connection->send($params);

        return $resp;
    }
}
