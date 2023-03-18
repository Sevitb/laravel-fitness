<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Footer extends Component
{

    public $contacts;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->contacts = json_decode(Storage::get('public/contacts.json'), true);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
