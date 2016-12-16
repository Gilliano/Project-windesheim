@extends("layouts.app");

@section('content')
    <div class="container">
        <h1>Setup Mail</h1>

        <form method="post" action="/mail/setup">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email_from">Email from:</label>
                    <input type="email" name="email_from" class="form-control" id="email_from">

                </div>
                <div class="form-group col-md-6">
                    <label for="email_to">Email to:</label>
                    <input type="email" name='email_to' class="form-control" id="email_to">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="subject">Subject:</label>
                    <input type="text" name='subject' class="form-control" id="subject">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="body">Body:</label>
                    <textarea class="form-control" name='body' rows="5" id="body"></textarea>
                </div>
            </div>


            <button type="submit" class="btn btn-lg btn-default">Send mail</button>
        </form>
    </div>
@stop