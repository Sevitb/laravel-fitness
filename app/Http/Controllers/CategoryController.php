<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{

    /** 
     * Default view name for controller
     * 
     * @var string
     */
    public $viewName = "category";

    /** 
     * Counstuctor
     * 
     * @var string
     */
    public function __construct()
    {
    }


    /** 
     * Get single category object
     * 
     * @param int $coachId
     */
    public function getCategory($categoryId)
    {
        if ($categoryId) {
            if (!$category = Category::find($categoryId)) {
                return abort(404);
            }
        }

        $services = $category->services()->get();

        $seasonTickets = $category->seasonTickets()->get();

        return view('pages.' . $this->viewName . '.' . $this->viewName . '', compact('category', 'services', 'seasonTickets'));
    }
}
