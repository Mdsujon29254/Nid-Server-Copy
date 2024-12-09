<?php

// Retrieve query parameters
$nid = $_GET['nid'];
$dob = $_GET['dob'];

// URL of the API endpoint
$url = "https://servercopy.taka0nai.xyz/API/MaltiPHP.php?nid=$nid&dob=$dob";

// Fetch the response from the API
$response = file_get_contents($url);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the response is valid and decoded properly
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON');
}

// Add new data to the response
$data['API OWNER'] = 'Anonymous Abbu';
$data['API MAKER'] = '@anonymousabbu';
$data['System'] = 'Server Copy API';


// Encode the updated data back to JSON with pretty print
$newResponse = json_encode($data, JSON_PRETTY_PRINT);

// Output the updated JSON response
header('Content-Type: application/json');
echo $newResponse;

?>