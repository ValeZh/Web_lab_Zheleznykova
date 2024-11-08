<?php
header('Content-Type: application/json');

$requestData = json_decode(file_get_contents('php://input'), true);

if (!$requestData || !isset($requestData['method']) || !isset($requestData['model'])) {
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$apiKey = ''; // Ваш API ключ
$method = $requestData['method'];
$model = $requestData['model'];
$properties = isset($requestData['properties']) ? $requestData['properties'] : [];

$apiUrl = "https://api.novaposhta.ua/v2.0/json/";

$data = [
    "apiKey" => $apiKey,
    "modelName" => $model,
    "calledMethod" => $method,
    "methodProperties" => $properties
];



$options = [
    'http' => [
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($apiUrl, false, $context);

if ($result === FALSE) {
    echo json_encode(['error' => 'API request failed']);
    exit;
}

echo $result;
?>