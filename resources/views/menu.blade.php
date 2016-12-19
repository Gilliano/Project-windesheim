@extends('layouts.app')

<link href="css/grid-list.css" rel="stylesheet">

@section('content')
    <div class="grid-container">
        <ul id="grid" class="grid">
        </ul>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="modal_edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit GridElement</h4>
                </div>
                <div class="modal-body">
                    <form class="form-group">
                        <input type="hidden" id="edit_id">
                        <label for="edit_link">Link</label>
                        <input type="text" name="link" id="edit_link" placeholder="www.google.com" class="form-control">
                        <label for="edit_image">Image</label>
                        <input type="text" name="image" id="edit_image" placeholder="http://www.w3schools.com/css/trolltunga.jpg" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit_save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJS')
    <script src="js/grid-list.js"></script>
@stop