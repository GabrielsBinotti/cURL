<?php

echo "CABEÇALHO <br>";
$header = getallheaders();

echo "<pre>";
print_r($header);
echo "</pre>";

echo "METODO <br>";
$http = $_SERVER['REQUEST_METHOD'];

echo "<pre>";
print_r($http);
echo "</pre>";

echo "POST <br>";


$input = file_get_contents('php://input');
$array = json_decode($input);
echo "<pre>";
print_r($_POST);
echo "</pre>";
