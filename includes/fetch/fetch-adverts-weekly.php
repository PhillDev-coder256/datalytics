<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// API URL and request data
$apiUrl = 'https://statex.ipsos.co.ug/index.php/data_api/logs_data';
$data = [
    'key' => '60da1144-dca4-4849-b2b3-31535ae8543999'
];

// Initialize cURL session
$handle = curl_init($apiUrl);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($handle, CURLOPT_HEADER, false);
curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// Execute cURL request
$output = curl_exec($handle);

// Check HTTP status code
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
if ($httpCode !== 200) {
    die(json_encode(['error' => 'API request failed with HTTP Code: ' . $httpCode]));
}

// Check for cURL errors
if (curl_errno($handle)) {
    die(json_encode(['error' => 'cURL Error: ' . curl_error($handle)]));
}

// Decode the API response
$adsData = json_decode($output, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die(json_encode(['error' => 'Error decoding JSON response: ' . json_last_error_msg()]));
}

// Handle empty data
if (empty($adsData)) {
    die(json_encode(['error' => 'No data available from API.']));
}

// Close cURL session
curl_close($handle);

// Remove duplicate entries
$adsData = array_values(array_unique(array_map('serialize', $adsData)));
$adsData = array_map('unserialize', $adsData);

// Count adverts by day of the week
$daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$advertsByDay = array_fill_keys($daysOfWeek, 0);

foreach ($adsData as $ad) {
    if (isset($ad['date'])) {
        $dayOfWeek = date('l', strtotime($ad['date'])); // Get day name
        if (isset($advertsByDay[$dayOfWeek])) {
            $advertsByDay[$dayOfWeek]++;
        }
    }
}

// Response
header('Content-Type: application/json');
echo json_encode([
    "labels" => array_keys($advertsByDay),
    "data" => array_values($advertsByDay),
]);
