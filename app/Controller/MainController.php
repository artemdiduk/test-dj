<?php
namespace App\Controller;

use App\interfaceRepository\BrandRepositoryInterface;
use App\interfaceRepository\CarsRepositoryInterface;
use Framework\Api\ApiInterface;
use Framework\Controller\Сontroller;



class MainController extends Сontroller
{

    public function __construct()
    {

    }

    public function index(): void
    {   
        require_once __DIR__  . "/../../resource/view/index.php";
    }

}