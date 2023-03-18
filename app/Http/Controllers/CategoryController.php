<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Get single coach object
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

        return view('pages.' . $this->viewName . '.' . $this->viewName . '', compact('category', 'services'));
    }
}
