<?php
namespace App\Model;

class User
{
    private $user = [];

    public function setUser(array $data): void
    {
        $this->user[]= $data;
        $_SESSION['user'][]= $this->user;
    }

    public function getUser(): array
    {   
        return $_SESSION['user'] ?? [];
    }
}