<?php

namespace yudijohn\Metronic\View\Components;

use Illuminate\View\Component;

class AppContainer extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $type = 'fluid' )
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view( 'metronic::components.app_container' );
    }
}