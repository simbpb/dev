<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuRepository;

class AdminController extends Controller
{
	protected $model;

    public function __construct(
        MenuRepository $menu
    ) {
        $this->model = $menu;
    }

    public function index()
    {
    	// $user = \Auth::user()->role;
     //    echo '<pre>';
     //    print_r($user);
    	// return;
        return view('dashboard');
    }
}
