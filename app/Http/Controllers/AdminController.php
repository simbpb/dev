<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuRepository;
use App\Models\Dashboard\DashboardRenstra;

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
    	$model = DashboardRenstra::all();
        return view('dashboard', compact('model'));
    }
}
