<?php
namespace App\Repository;

interface InterfaceUserRepository {
    public function get(): array;

    public function create($array): void;
}