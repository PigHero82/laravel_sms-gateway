<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputForm extends Component
{
    public $label;
    public $type;
    public $class;
    public $name;
    public $id;
    public $placeholder;
    public $value;
    public $minlength;
    public $maxlength;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $type, $class, $name, $id, $placeholder, $value, $maxlength, $minlength, $required)
    {
        $this->label = $label;
        $this->type = $type;
        $this->class = $class;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->minlength = $minlength;
        $this->maxlength = $maxlength;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input-form');
    }
}
