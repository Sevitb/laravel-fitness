<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;

class CoachController extends Controller
{

    /** 
     * Default view name for controller 
     * 
     * @var string
     */
    public $viewName = "coach";

    /** 
     * Default list view name for controller
     * 
     * @var string
     */
    public $listViewName = "coaches";

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
    public function getCoach($coachId = null)
    {
        if ($coachId) {
            if (!$coach = Coach::find($coachId)) {
                return abort(404);
            }
        } else {
            $coach = Coach::inRandomOrder()->first();
            $coachId = $coach->id;
        }

        $otherCoaches = $this->getCoachesExept($coachId);

        return view('pages.' . $this->viewName . '.' . $this->viewName . '', compact('coach'))
            ->with('params', [
                "otherCoaches" => $otherCoaches
            ]);
    }

    /** 
     * Get coach objects collection
     * 
     */
    public function getCoaches()
    {
        $coaches = Coach::all();

        return view('index', $coaches);
    }

    /** 
     * Get all coach objects collection, execpt one 
     * 
     * @param int $coachId
     */
    public function getCoachesExept($coachId)
    {
        return  Coach::all(['id', 'name', 'surname', 'portrait', 'description']);
    }
}
