<?php

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

$identifier = idx();
RedisPersist::set($identifier, $input);
$value = RedisPersist::get($identifier);
dump($value);

$identifier = idx();
RedisPersist::set($identifier, $inputWithTTL, true);
$value = RedisPersist::get($identifier);
dump($value);