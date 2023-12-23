<?php

namespace yudijohn\Metronic\Services\View\Layout;

class PageLayout
{
    public $title = '';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $title = '' )
    {
        $this->title = $title;
    }

    /**
     * Return generated layout view.
     *
     * @return \Illuminate\Http\Response
     */
    public function view( $view = '' )
    {
        return view( 'metronic::services.layout.default', [
            '_yms_title' => $this->title,
            '_yms_view' => view( $view )
        ] );
    }
}