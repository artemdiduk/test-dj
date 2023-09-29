<?php
use Framework\Route;

use App\Containers;
$containers = new Containers();

Route::set('/', ['controller' => $containers->containers['MainController'], "method" => "index"], "GET");
Route::set('/user', ['controller' => $containers->containers['UserController'], "method" => "store"], "POST");