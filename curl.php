<?php

/**
 * The function make simple request without authentication with args object.
 * The function receive 3 paraments:
 * $url => API url  -  required
 * $method => GET, POST, DELETE, PUT (are more comuns) - required
 * $args => array with form data, in format object. When you not informed it is empty to default. - optional
 * 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
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
            'Accept: application/json',
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

/**
 * The function make simple request qith authetication basicAuth with args object.
 * $url => API url  -  required
 * $method => GET, POST, DELETE, PUT (are more comuns) - required
 * $args => array with form data, in format object. When you not informed it is empty to default. - optional
 * $user => user to authentication
 * $pass => password to authetication
 */
function curl_req_obj_basicAuth($url, $method, $args = [], $user, $pass){

    // Open to connection
    $curl = curl_init();

    // Config default
    curl_setopt_array($curl, [
        CURLOPT_URL                 => $url,
        CURLOPT_CUSTOMREQUEST       => $method,
        CURLOPT_RETURNTRANSFER      => true,
        CURLOPT_HTTPAUTH            => CURLAUTH_BASIC,
        CURLOPT_USERPWD             => "$user:$pass"
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
 * The function make simple request qith authetication basicAuth with args json.
 * $url => API url  -  required
 * $method => GET, POST, DELETE, PUT (are more comuns) - required
 * $args => array with form data, in format object. When you not informed it is empty to default. - optional
 * $user => user to authentication
 * $pass => password to authetication
 */

function curl_req_json_basicAuth($url, $method, $args = [], $user, $pass){

    // Open to connection
    $curl = curl_init();

    // Config default
    curl_setopt_array($curl, [
        CURLOPT_URL                 => $url,
        CURLOPT_CUSTOMREQUEST       => $method,
        CURLOPT_RETURNTRANSFER      => true,
        CURLOPT_HTTPAUTH            => CURLAUTH_BASIC,
        CURLOPT_USERPWD             => "$user:$pass"
    ]);

    // Verification args
    if(!empty($args)){

        // Convert to json
        $json = json_encode($args);

        // Config header to json
        $headers = [
            'Accept: application/json',
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