<?php

namespace App\View\Components\W3BTLaravelKit\UI;

use Illuminate\View\Component;
use Illuminate\View\View;

class InputDateComponent extends Component
{
    public $type;
    public $placeholder;
    public $class;
    /**
     * Crear una nueva instancia del componente.
     * @param string $type
     * @param string $placeholder
     * @param string $class
     */
    public function __construct($type, $placeholder, $class = '')
    {
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->class = $class;
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('components.w3btlaravelkit.ui.inputdatecomponent');
    }
}