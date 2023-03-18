<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{

    /** 
     * Type of input
     * 
     * @var string
     */
    public $type;

    /** 
     * Default laceholder for input
     * 
     * @var string
     */
    public $name;

    /** 
     * Default laceholder for input
     * 
     * @var string
     */
    public $placeholder;

    /** 
     * Extra classes
     * 
     * @var string
     */
    public $class;

    /** 
     * Extra classes
     * 
     * @var string
     */
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($type = "text", $name = "", $placeholder = "Введите значение", $class = "", $value = "")
    {
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->class = $class;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
