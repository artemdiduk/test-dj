<?php
namespace App\Storage;


use App\Storage\InterfaceStorage\InerfaceUserStorage;
use App\Repository\InterfaceUserRepository;

class UserStorage implements InerfaceUserStorage
{
    private InterfaceUserRepository $userRepository;

    public function __construct(InterfaceUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function create(array $data): void
    {   
        $data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'surname' => $data['surname']
        ];
        $logMessage = "Зарегистрирован новый пользователь: {$data['name']}, {$data['email']}\n";
        file_put_contents("registration_log.txt", $logMessage, FILE_APPEND);
        $this->userRepository->create($data);
    }
    public function findUser(string $data, $element): bool
    {
       
        foreach ($this->userRepository->get() as $item) {
            $item = $item[0] ?? $item;
            if (isset($item[$element]) && $item[$element] === $data) {
                return true; 
            }
        }
        return false;
    }
    public function getUser(): array {
        return $this->userRepository->get();
    }

}