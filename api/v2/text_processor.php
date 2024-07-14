<?php

require 'root_classes/Request.php';
require 'root_classes/Response.php';
require 'root_classes/JsonResponse.php';

class TextProcessorRequest extends \root_classes\Request
{
    public $text = null;
    public $reverse = false;
    public $to_upper = false;

    public function __construct()
    {
        parent::__construct();

        $json = json_decode($this->content, true);
        
        foreach ($json as $field => $value) {
            $this->$field = $value;
        }
    }
}

$request = new TextProcessorRequest();
$response = new \root_classes\JsonResponse();

if ($request->text == '' || $request->text == null) {
    $response->addError('Field "Text" is empty', 200);
}

$text = $request->text;

if ($request->reverse) {
    $text = strrev($text);
}
if ($request->to_upper) {
    $text = strtoupper($text);
}

$response->setContent(['result' => $text]);

$response->getResponse();