<div class="modal fade" id="modal-datatable-row-delete" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {{ Form::open( [ 'method' => 'delete', 'id' => 'datatable-delete-form' ] ) }}
                <div class="modal-body">
                    <p>Are you sure to delete this data?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {{ Form::button( '<i class="fa fa-trash-alt mr-1"></i> Delete', [ 'class' => 'btn btn-danger', 'type' => 'submit' ] ) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@push( 'scripts' )
    <script type="text/javascript">
        $( document ).on( 'click', '.datatable-delete-row-button', function() {
            $( '#datatable-delete-form' ).attr( 'action', $( this ).data( 'href' ) );
        } );
    </script>
@endpush