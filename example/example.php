<?php 

require_once __DIR__.'/../vendor/autoload.php';

use Sockam\PiwikReporting\Connection\HttpConnection;
use Sockam\PiwikReporting\Client;
use GuzzleHttp\Client as GuzzleClient;


$guzzle = new GuzzleClient();
$connection = new HttpConnection('https://periscope.sockam.com/');

$client = new Client($connection,'8462a8ecc6aa90011563fc80a44ca50b');

$parameters = array(
	'idSite' => 1,
	'date' => 'yesterday',
	'period' => 'week'
	);

$data = $client->call('Resolution.getResolution',$parameters,'json');

echo $data;
