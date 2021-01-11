<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $name;
    public $class;
    public $id;
    public $rows;
    public $placeholder;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $class, $id, $rows, $placeholder, $required)
    {
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->id = $id;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
