<?php

namespace Sockam\PiwikReporting\Test;

use PHPUnit_Framework_TestCase;
use Sockam\PiwikReporting\Client;

class ClientTest extends PHPUnit_Framework_TestCase
{
    public function testConnection()
    {
        $conn = $this->getMockBuilder('Sockam\PiwikReporting\Connection\HttpConnection')
            ->disableOriginalConstructor()
            ->getMock();
        $client = new Client($conn, 'testtoken');
        $this->assertSame($conn, $client->getConnection());
    }
}
