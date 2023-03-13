<?php

namespace yudijohn\Metronic\View\Components;

use Illuminate\View\Component;

class AppContainer extends Component
{
    /**
     * The element id.
     *
     * @var string
     */
    public $id;

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
    public function __construct( $id = 'kt_app_content_container', $type = 'fluid' )
    {
        $this->id = $id;
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