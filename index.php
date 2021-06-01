<?php
require 'vendor/autoload.php';
use Predis\Client as Client;
use Tracy\Debugger;

Debugger::enable();

/*
$client = new Client(
	[
		'scheme' => 'tcp',
		'host'   => '127.0.0.1',
		'port'   => 6379,
	]
);
*/
$client = new Client('tcp://127.0.0.1:6379');
$folder_structure = [
	'cache',
	'app',
	'service',
	'lang_' . rand(0, 9),
];
$input = [
	'Neo',
	'Morpheus',
	'Trinity',
	'Cypher',
	'Tank'
];

$redis_cache = implode(":", $folder_structure);
$client->set($redis_cache, serialize($input));
$client->expire($redis_cache, 3600);

$value = $client->get($redis_cache);

dump($value);
dump(unserialize($value));