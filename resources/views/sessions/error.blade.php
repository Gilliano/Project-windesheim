@if (Session::has('error'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('error') }}
            </div>
        </div>
    </div>
@endif