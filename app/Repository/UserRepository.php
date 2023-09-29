<?php
namespace App\Repository;

use App\Repository\InterfaceUserRepository;
use App\Model\User;

class UserRepository implements InterfaceUserRepository
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function get(): array
    {
        return $this->model->getUser();
    }
    
    public function create($array): void {
       
        $this->model->setUser($array);
    }
}