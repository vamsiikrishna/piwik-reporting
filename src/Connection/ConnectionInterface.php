<?php

namespace Sockam\PiwikReporting\Connection;

interface ConnectionInterface
{
    public function send(array $params = array());
}
