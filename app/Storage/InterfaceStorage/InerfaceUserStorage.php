<?php
namespace App\Storage\InterfaceStorage;

interface InerfaceUserStorage {
    public function create (array $data): void;

    public function findUser(string $data, $element): bool;

    public function getUser(): array;

}