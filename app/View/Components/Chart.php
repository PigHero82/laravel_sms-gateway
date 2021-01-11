<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Chart extends Component
{
    public $class;
    public $classHeight;
    public $title;
    public $id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class, $classHeight, $id, $title)
    {
        $this->class = $class;
        $this->classHeight = $classHeight;
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.chart');
    }
}
