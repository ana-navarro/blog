<?php

namespace App\View\Components;

use Illuminate\View\Component;

class badge extends Component
{
    public $title;
    public $date;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = $title;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.badge');
    }
}
