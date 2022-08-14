<?php

/*
Requisição get simples, como se estivesse acessando pela web

$curl = curl_init(); // iniciando o curl

curl_setopt($curl, CURLOPT_URL, "http://192.168.0.28/cURL/api.php"); // COnfigurando a URL
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET"); // metodo

curl_exec($curl); // executa a requisição

curl_close($curl); // fecha a conexão
*/

/*
Requisição para salvar em variavel
$curl = curl_init(); // iniciando o curl

curl_setopt($curl, CURLOPT_URL, "http://192.168.0.28/cURL/api.php"); // COnfigurando a URL
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET"); // metodo
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // retorna o que tem na pagina para armazenar na variavel

$response = curl_exec($curl); // executa a requisição

curl_close($curl); // fecha a conexão

echo $response;
*/

/* 
configuração mais bonita
$curl = curl_init(); // iniciando o curl

curl_setopt_array($curl, [
    CURLOPT_URL =>"http://192.168.0.28/cURL/api.php",
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($curl); // executa a requisição

curl_close($curl); // fecha a conexão

echo $response;
*/

$curl = curl_init(); // iniciando o curl

$headers = [
    'Authorization: Bearer 465465465462165321',
    'Content-Type: application/json'
];

$post = [
    'nome' => "Gabriel da Silva Binotti"
];

$json = json_encode($post);



curl_setopt_array($curl, [
    CURLOPT_URL             =>"http://192.168.0.28/cURL/api.php",
    CURLOPT_CUSTOMREQUEST   => "POST",
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_HTTPHEADER      => $headers,
    CURLOPT_POSTFIELDS      => $json
]);

$response = curl_exec($curl); // executa a requisição

curl_close($curl); // fecha a conexão

echo $response;