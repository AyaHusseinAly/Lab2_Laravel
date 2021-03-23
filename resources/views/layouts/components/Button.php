<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
     public $type;
     public $href;
     public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$href,$text)
    {
          $this->type = $type;
          $this->href = $href;
          $this->text = $text;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        
        return view('components.button');
    }
}