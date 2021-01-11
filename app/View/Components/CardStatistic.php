<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardStatistic extends Component
{
    public $title;
    public $value;
    public $icon;
    public $color;
    public $class;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $value, $icon, $color, $class)
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->color = $color;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-statistic');
    }
}
