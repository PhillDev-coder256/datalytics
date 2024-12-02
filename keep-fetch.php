<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$filePath = '/opt/lampp/htdocs/datalytics/data-visualization/data.json';

// Check if file exists
if (!file_exists($filePath)) {
    die(json_encode(['error' => 'Data file not found.']));
}

// Read JSON file
$jsonData = file_get_contents($filePath);
$adsData = json_decode($jsonData, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die(json_encode(['error' => 'Error decoding JSON: ' . json_last_error_msg()]));
}

// Handle empty data
if (empty($adsData)) {
    die(json_encode(['error' => 'No data available.']));
}

// Remove duplicate entries
$adsData = array_values(array_unique(array_map('serialize', $adsData)));
$adsData = array_map('unserialize', $adsData);

// DataTables Integration
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 0;
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$length = isset($_GET['length']) ? intval($_GET['length']) : 10; // Default to 10 records per page

$_SESSION['totalRecords'] = $totalRecords = count($adsData);
$paginatedData = array_slice($adsData, $start, $length);

// Response
header('Content-Type: application/json');
echo json_encode([
    "draw" => $draw,
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords, // Assuming no filtering yet
    "data" => $paginatedData
]);

?>










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

// DataTables Integration
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 0;
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$length = isset($_GET['length']) ? intval($_GET['length']) : 10; // Default to 10 records per page

$_SESSION['totalRecords'] = $totalRecords = count($adsData);
$paginatedData = array_slice($adsData, $start, $length);

// Response
header('Content-Type: application/json');
echo json_encode([
    "draw" => $draw,
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords, // Assuming no filtering yet
    "data" => $paginatedData
]);
