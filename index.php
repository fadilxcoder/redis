<?php

############# Redis #############

include 'Redis.php';

function idx() {
	return [
		'cache',
		'app',
		'service',
		'lang_' . rand(0, 999),
	];
}

$input = [
	'Neo',
	'Morpheus',
	'Trinity',
	'Cypher',
	'Tank'
];

$inputWithTTL = [
	'Morpheus',
	'Cypher',
];

dump('-------------------------------------------- Redis --------------------------------------------');

$identifier = idx();
RedisPersist::set($identifier, $input);
$value = RedisPersist::get($identifier);
dump($value);

$identifier = idx();
RedisPersist::set($identifier, $inputWithTTL, true);
$value = RedisPersist::get($identifier);
dump($value);


############# Memcache #############

dump('-------------------------------------------- Memcache --------------------------------------------');

$mc = new Memcache();

$mc->addServer("127.0.0.1", 11211);

dump(
	$mc->get("my_first_key0"),
	$mc->get("my_first_key1"),
	$mc->get("my_first_key2"),
	$mc->get("my_first_key3")
);

$mc->set("my_first_key" .  rand (0, 3), "MemCached (^_^)" . rand (999, 999999)) or die("'my_first_key' couldn't be created !");

dump(
	$mc->get("my_first_key0"),
	$mc->get("my_first_key1"),
	$mc->get("my_first_key2"),
	$mc->get("my_first_key3")
);