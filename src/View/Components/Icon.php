<?php

namespace yudijohn\Metronic\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $name )
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view( 'metronic::components.icons.' . $this->name );
    }
}
