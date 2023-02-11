<?php

class CurlRequest
{
    private static $instance = null;


    // Define methods private
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}


    // Method to return the new instance
    public static function getInstance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Makes a HTTP request to the specified URL using cURL.
     *
     * @param string $url The URL to make the request to
     * @param array $data An array of data to send with the request (applicable only for POST requests)
     * @param array $headers An array of headers to send with the request
     * @param string $method The HTTP method to use for the request (defaults to POST)
     * @param array $auth An array containing username and password for basic authentication
     *
     * @return mixed The response from the server, decoded as an array
     */

    public function makeRequest($url, $data = [], $headers = [], $method = 'POST', $auth = [])
    {
        // Initialize o curl
        $ch = curl_init();

        // Define options
        curl_setopt($ch, CURLOPT_URL, $url); // Define URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Define if accept return string
        curl_setopt($ch, CURLOPT_ENCODING, ''); // Define the type accept encondig
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10); // Define the max redirects;
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Define in seconds max time to response of request
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Define accept redirect
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); // Define version of request HTTP
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method)); // Define custom method to request

        // Verify if the method is a POST
        if($method === 'POST')
        {
            curl_setopt($ch, CURLOPT_POST, true); // Define the form request will do, information then data will be send in body of request
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        // Verify if headers was config
        if(!empty($headers))
        {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Config headers HTTP request
        }

        // Verify if was pass authentication
        if(!empty($auth))
        {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // Define type basic auth
            curl_setopt($ch, CURLOPT_USERPWD, $auth['username'] . ':' . $auth['password']); // Define user and password
        }

        $response = curl_exec($ch); // Response of the request
        curl_close($ch); // Close the request
        return json_decode($response, false); // Return response im format obj, case you went other type define true

    }
}



// Exemple use
$curlRequest = CurlRequest::getInstance();
$response = $curlRequest->makeRequest($url, $data, $headers, $method, $auth);
