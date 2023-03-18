<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CoachCard extends Component
{
    /** 
     * Contains coach id
     * 
     * @var int
     */
    public $id;

    /** 
     * Contains full coach name
     * 
     * @var string
     */
    public $name;

    /** 
     * Contains brief info about coach
     * 
     * @var string
     */
    public $briefInfo;

    /** 
     * Contains coach portrait path
     * 
     * @var string
     */
    public $portrait;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $briefInfo, $portrait)
    {
        $this->id = $id;
        $this->name = $name;
        $this->briefInfo = $briefInfo;
        $this->portrait = $portrait;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.coach-card');
    }
}
