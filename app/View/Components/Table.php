<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $class;
    public $title;
    public $description;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $class, $description, $id)
    {
        $this->class = $class;
        $this->title = $title;
        $this->description = $description;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table');
    }
}
