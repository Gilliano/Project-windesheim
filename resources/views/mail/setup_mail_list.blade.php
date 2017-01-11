@extends("layouts.app");

@section('additionalCSS')
    <link href="css/fastselect.css" rel="stylesheet">
    <link href="/summernote_0.8.2/summernote.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">

@stop
@section('content')
    <div class="container">
        <h1>Setup Mail</h1>

        <form method="post" action="#">
            <div class="form-group col-md-6">
                <label for="education_source">education_source</label>
                <select id="education_source" name="education_source" class="form-control">
                    @foreach($edu as $edu)
                        <option value='{{ $edu->id }}'>{{ $edu->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="education">education</label>
                <select id="education" name="education" class="form-control">
                        <option> Select eduction_source first! </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="group">group</label>
                <select id="group" name="group" class="form-control">
                    <option> Select education first! </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="classmates">classmates</label>
                <select id="classmates" name="classmates" class="form-control selectpicker"  multiple data-selected-text-format="count > 3">
                    <option> Select group first! </option>
                </select>
            </div>
        </form>

        <form method="post" action="/mail/setup">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email_from">Email from:</label>
                    <input type="email" name="email_from" class="form-control" id="email_from" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}">

                </div>
                <div class="form-group col-md-6">
                    <label for="email_to">Email to:</label>
                    <input type="email" name='email_to' class="form-control" id="email_to">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="mail_to">Mail to:</label>
                    <input
                            type="text"
                            multiple
                            class="tagsInput form-control"
                            value="Algeria,Angola,kees"
                            data-initial-value='[{"text": "Algeria", "value" : "Algeria"}, {"text": "Angola", "value" : "Angola"}, {"text": "abc", "value" : "abc"}]'
                            data-user-option-allowed="true"
                            data-url="/mail/groups/1"
                            data-load-once="true"
                            name="mail_to"/>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="mail_to">Mail to:</label>
                    <input
                            type="text"
                            multiple
                            class="tagsInput form-control"
                            value="Algeria,Angola"
                            data-initial-value='[{"text": "Algeria", "value" : "Algeria"}, {"text": "abc", "value" : "abc"}]'
                            data-user-option-allowed="true"
                            data-url="/mail/groups/1"
                            data-load-once="true"
                            name="mail_too"/>
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


@section('additionalJS')


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>


    <script src="js/fastsearch.js"></script>
    <Script>
        $.getScript("js/fastselect.js", function () {
            $('.tagsInput').fastselect();
        })
    </Script>

    <script src="/summernote_0.8.2/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#body').summernote({
                height:300,
            });

            $('#education').attr('disabled', 'disabled');
            $('#group').attr('disabled', 'disabled');
            $('#classmates').attr('disabled', 'disabled');

            $('#education_source').click(function(){
                var education_source = $('#education_source').val()
                $('#education')
                    .find('option')
                    .remove()
                    .end()
                ;
                $('#education').removeAttr('disabled');
                $('#group').attr('disabled', 'disabled');
                $('#classmates').attr('disabled', 'disabled');
                $.get('/mail/education/'+ education_source , function( data ) {
                    $.each(data, function(val, text) {
                        $('#education').append(
                                $('<option></option>').val(text['education_id']).html(text['name'])
                        );
                    });
                });
            });
            $('#education').click(function(){
                var education = $('#education').val()
                $('#group')
                        .find('option')
                        .remove()
                        .end()
                ;
                $('#group').removeAttr('disabled');
                $('#classmates').attr('disabled', 'disabled');
                $.get('/mail/groups/'+ education , function( data ) {
                    $.each(data, function(val, text) {
                        $('#group').append(
                                $('<option></option>').val(text['group_id']).html(text['text'])
                        );
                    });
                });
            });

            $('#group').click(function(){
                var group = $('#group').val()
                $('#classmates')
                        .find('option')
                        .remove()
                        .end()
                ;
                $('#classmates').removeAttr('disabled');
                $.get('/mail/classmates/'+ group , function( data ) {
                    $.each(data, function(val, text) {
                        console.log(text);
                        $('#classmates').append(
                                $('<option></option>').val(text['value']).html(text['text'])
                        );

//                        $.getScript("js/fastselect.js", function () {
//                            $('#classmates').fastselect();
//                        })
                    });
                });
            });
        });
    </script>

@stop
