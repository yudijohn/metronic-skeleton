@if( isset( $show_url ) )
    <a href="{{ $show_url }}" class="btn btn-success" title="Show"><i class="fa fa-search"></i></a>
@endif
@if( isset( $edit_url ) )
    <a href="{{ $edit_url }}" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
@endif
@if( isset( $delete_url ) )
    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-datatable-row-delete" data-href="{{ $delete_url }}" class="btn btn-danger datatable-delete-row-button" title="Delete">
        <i class="fa fa-trash-alt"></i>
    </a>
@endif