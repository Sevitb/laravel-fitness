<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coach;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $categoriesCount = Category::count();

        $servicesCount = Service::count();

        $coachesCount = Coach::count();

        return view('admin.index', compact('categoriesCount', 'servicesCount', 'coachesCount'));
    }
}
