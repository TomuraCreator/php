<?php
require 'autoload.php';
require 'config/SystemConfig.php';

$array = file_get_contents('https://swapi.co/api/starships');

// $relative = new FileAccessModel('file');
$json = new JsonFileAccessModel('file');

// $relative->write('Это просто строка');
// var_dump($relative->read());

$json->writeJSON($array);

var_dump($json->readJSON());

