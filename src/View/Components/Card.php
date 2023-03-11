<?php

namespace yudijohn\Metronic\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * The card class.
     *
     * @var string
     */
    public $class;

    /**
     * The title.
     *
     * @var string
     */
    public $title;

    /**
     * The subtitle.
     *
     * @var string
     */
    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $class = '', $title = null, $subtitle = null )
    {
        $this->class = $class;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view( 'metronic::components.card' );
    }
}
