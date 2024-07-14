<?php

namespace root_classes;

class Request
{
    protected $content;

    public function __construct()
    {
        $this->content = file_get_contents('php://input');
    }

    public function getContent()
    {
        return $this->content;
    }
}