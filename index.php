<?php
require 'vendor/autoload.php';

use Guzzle\Http\Client;


$client = new Client();
$subject = 'Test Email';
$message = 'Greetings from Apleona';
$to = 'conor@test.com';
$cc = json_encode(array('test1@test.com','test2@test.com'));
try {
    $response = $client->get('http://localhost:8000/send-mail/?subject='.$subject.'&to='.$to.'&cc='.$cc.'&message='.$message)->send();
}

catch (Guzzle\Http\Exception\BadResponseException $e) {
    echo 'Uh oh! ' . $e->getMessage() .'<br>';
    echo 'HTTP request URL: ' . $e->getRequest()->getUrl() . "\n";
    echo 'HTTP request: ' . $e->getRequest() . "\n";
    echo 'HTTP response status: ' . $e->getResponse()->getStatusCode() . "\n";
    echo 'HTTP response: ' . $e->getResponse() . "\n";
}
