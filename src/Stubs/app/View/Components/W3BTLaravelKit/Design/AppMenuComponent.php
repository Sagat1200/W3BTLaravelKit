<?php

namespace App\View\Components\W3BTLaravelKit\Design;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppMenuComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.w3btlaravelkit.design.appmenucomponent');
    }
}