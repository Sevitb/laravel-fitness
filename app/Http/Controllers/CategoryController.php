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

        $services = DB::select(
            "select s.*, concat('[',group_concat(
                json_object(
                'coach_level', cl.level,
                'value', cscl.service_price
                )),']') as service_prices
            from category_service_coach_level as cscl
            left join services as s on s.id = cscl.service_id
            left join coach_levels as cl on cl.id = cscl.coach_level_id
            where cscl.category_id = :category_id
            group by cscl.service_id",
            ['category_id' => $categoryId]
        );

        $seasonTickets = DB::select(
            "select st.*, concat('[',group_concat(
                json_object(
                'coach_level', cl.level,
                'value', cstcl.season_ticket_price
                )),']') as season_ticket_prices
            from category_season_ticket_coach_level as cstcl
            left join season_tickets as st on st.id = cstcl.season_ticket_id
            left join coach_levels as cl on cl.id = cstcl.coach_level_id
            where cstcl.category_id = :category_id
            group by cstcl.season_ticket_id",
            ['category_id' => $categoryId]
        );

        return view('pages.' . $this->viewName . '.' . $this->viewName . '', compact('category', 'services', 'seasonTickets'));
    }
}
