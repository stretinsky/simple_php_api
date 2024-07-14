<?php

namespace root_classes;

class Response
{
    protected $content;
    protected $code = 200;
    
    public function __construct()
    {

    }

    public function getResponse()
    {
        http_response_code($this->code);
        echo $this->content;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function setContent($content): self
    {
        $this->content = $content;
        return $this;
    }
}