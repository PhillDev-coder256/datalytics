<?php
session_start();

$data = array(
    'key' => '60da1144-dca4-4849-b2b3-31535ae8543999',
    'php_master' => true,
    'limit' => 50,
    'page' => isset($_POST['page']) ? intval($_POST['page']) : 1, //Get the page number from POST
);

//Add start and end dates from the POST data if available, otherwise use defaults.
if (isset($_POST['startdate']) && isset($_POST['enddate'])) {
    $data['startdate'] = $_POST['startdate'];
    $data['enddate'] = $_POST['enddate'];
} else {
    $data['startdate'] = '2024-11-05';
    $data['enddate'] = '2024-11-05';
}


// $url = "https://statex.ipsos.co.ug/index.php/data_api/logs_data";
$url = "/opt/lampp/htdocs/datalytics/data-visualization/data.json";

$handle = curl_init($url);
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($handle);
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if (curl_errno($handle)) {
    die(json_encode(['error' => 'cURL error: ' . curl_error($handle)]));
}
curl_close($handle);


if ($httpCode !== 200 || !$output) {
    die(json_encode(['error' => "Error fetching data. HTTP Code: $httpCode"]));
}

$result = json_decode($output, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die(json_encode(['error' => 'Error decoding JSON: ' . json_last_error_msg()]));
}

if (isset($result['error'])) {
    die(json_encode(['error' => 'API Error: ' . $result['error']]));
}

//Return only the data portion and total count in a format understood by DataTables
echo json_encode([
    "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1, //For DataTables
    "recordsTotal" => isset($result['total']) ? $result['total'] : count($result['data'] ?: []), //If total is provided by API use that otherwise estimate.
    "recordsFiltered" => isset($result['total']) ? $result['total'] : count($result['data'] ?: []), //If total is provided by API use that otherwise estimate.
    "data" => isset($result['data']) ? $result['data'] : []
]);
