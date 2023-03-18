<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Coach;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /** 
     * Default view name for controller 
     * 
     * @var string
     */
    public $viewName = "home";

    public function index()
    {
        $coach = Coach::select('id', 'portrait')->inRandomOrder()->first();
        $categories = Category::all();

        $contacts = json_decode(Storage::get('public/contacts.json'), true);
        $pageData = json_decode(Storage::get('public/home_page.json'), true);

        return view('pages.' . $this->viewName . '.' . $this->viewName . '', compact('coach', 'contacts', 'pageData', 'categories'));
    }
}
