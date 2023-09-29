<?php

namespace Framework;

class Request
{
    public $api;
    public $filed = [];

    private $errors = [];
    public function __construct()
    {
        $this->api = $this->jsonServer();
    
    }

    public function getError(): array
    {
        return $this->errors;
    }

    public function setError(array $errors): void
    {
        $this->errors = $errors;
    }

    public function input(string $data): string
    {
        return trim($this->api[$data] ?? '');
    }
   

    public function only(array $array): self
    {
        $result = [];
       
        foreach ($array as $key) {
            $result[$key] = $this->input($key);
        }
        $this->filed = $result;
        return $this;
    }
    public function get(): array
    {
        return $this->filed;
    }

    public function validate($data)
    {
        if (empty(Helper::validation($data, $this->filed))) {
            return $this->filed;
        }
        $this->setError(Helper::validation($data, $this->filed));
    }

    public function toJson($data, $status): void
    {
        header('Content-Type: application/json');
        http_response_code($status);
        $this->filed = [];
        $this->errors = [];
        echo json_encode($data);
    }

    public function jsonServer(): ?array
    {
        $inputData = file_get_contents('php://input');
        $jsonData = json_decode($inputData, true);
        return $jsonData;
    }


}