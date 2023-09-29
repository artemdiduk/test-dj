<?php
namespace App;

use App\Controller\MainController;
use App\Controller\UserController;
use App\Model\User;
use App\Repository\UserRepository;
use App\Storage\UserStorage;
use Framework\Request;
class Containers {

    public $containers;

    public function __construct() {
        $this->containers['MainController'] = new MainController(
           
        );
        $this->containers['UserController'] = new UserController (
            new UserStorage(new UserRepository(new User)),
            new Request()
        );

    }

}