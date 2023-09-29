<?php
namespace App\Controller;

use Framework\Controller\Сontroller;
use App\Storage\InterfaceStorage\InerfaceUserStorage;
use Framework\Request;

class UserController extends Сontroller
{
  public InerfaceUserStorage $userStorage;
  public Request $request;
  public function __construct(InerfaceUserStorage $userStorage, Request $request)
  {
    $this->userStorage = $userStorage;
    $this->request = $request;
  }

  public function store()
  { 
   
    $data = $this->request->only(['name', 'email', 'surname', 'password', 'confirmPassword'])->validate(
      [
        'name' => "required",
        'email' => "required|email",
        'surname' => "required",
        'password' => "required|password_confirmation:confirmPassword"
      ],
    );
    if ($this->request->getError()) {
      $data = $this->request->getError();
      return $this->request->toJson(['error' => $data], 400);
    }

    if ($this->userStorage->findUser($data['email'], 'email')) {

      return $this->request->toJson(['error' => ["Such a user already exists"]], 400);
    }
    
    $this->userStorage->create($data);
   
    $this->request->toJson(['ok' => $this->userStorage->getUser()], 200);
    
  }

}