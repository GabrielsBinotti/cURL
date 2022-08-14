<?php

/*
Requisição get simples, como se estivesse acessando pela web
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

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
*/



/**
 * The function make simple request without authentication with args object.
 * The function receive 3 paraments:
 * $url => API url  -  required
 * $method => GET, POST, DELETE, PUT (are more comuns) - required
 * $args => array with form data, in format object. When you not informed it is empty to default. - optional
 */
function curl_req_obj($url, $method, $args = []){

    // Open to connection
    $curl = curl_init();

    // Config default
    curl_setopt_array($curl, [
        CURLOPT_URL                 => $url,
        CURLOPT_CUSTOMREQUEST       => $method,
        CURLOPT_RETURNTRANSFER      => true
    ]);

    // Verification args
    if(!empty($args)){
        curl_setopt($curl, CURLOPT_POSTFIELDS, $args);
    }

    // Save the return of command exec
    $response = curl_exec($curl);

    // Close to connection
    curl_close($curl);

    // Return the data for user
    return $response;
}

/**
 * The function make simple request withou authetication with args json.
 * $url => API url  -  required
 * $method => GET, POST, DELETE, PUT (are more comuns) - required
 * $args => array with form data, in format object. When you not informed it is empty to default. - optional
 */

function curl_req_json($url, $method, $args = []){

    // Open to connection
    $curl = curl_init();

    // Config default
    curl_setopt_array($curl, [
        CURLOPT_URL                 => $url,
        CURLOPT_CUSTOMREQUEST       => $method,
        CURLOPT_RETURNTRANSFER      => true
    ]);

    // Verification args
    if(!empty($args)){

        // Convert to json
        $json = json_encode($args);

        // Config header to json
        $headers = [
            'Content-Type: application/json'
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // Send json data
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    }

    // Save the return of command exec
    $response = curl_exec($curl);

    // Close to connection
    curl_close($curl);

    // Return the data for user
    return $response;
}