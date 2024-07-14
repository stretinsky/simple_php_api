<?php
header('Content-Type: application/json; charset=utf-8');

$input = json_decode(file_get_contents('php://input'), true);

$output = [
    'code' => 200,
    'data' => [],
    'errors' => []
];

$text = $input['text'];
if ($text == '' || $text == null) {
    $output['errors'][] = 'Field "Text" is empty';
    $output['code'] = 200;
    http_response_code(200);
}

$text = $input['text'];
if ($text == '' || $text == null) {
    $output['errors'][] = 'Field "Text" is empty';
    $output['code'] = 400;
    http_response_code(400);
    die();
}


if ($input['reverse']) {
    $text = strrev($text);
}
if ($input['to_upper']) {
    $text = strtoupper($text);
}

$output['data'] = [
    'result' => $text
];

echo json_encode($output);