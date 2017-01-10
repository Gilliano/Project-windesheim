@extends("layouts.app");

@section('additionalCSS')
    <link href="css/fastselect.css" rel="stylesheet">
    <link href="/summernote_0.8.2/summernote.css" rel="stylesheet">

    {{--<style>--}}
        {{--.fstElement {--}}
            {{--width: 100%;--}}
        {{--}--}}

    {{--</style>--}}
@stop
@section('content')
    <div class="container">
        <h1>Setup Mail</h1>

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
                            data-url="mail/list"
                            data-load-once="true"
                            name="mail_to"/>
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
    <script src="js/fastsearch.js"></script>
    <Script>
        $.getScript("js/fastselect.js", function () {
            $('.tagsInput').fastselect();
            $('.multipleInputDynamic').fastselect();
        })
    </Script>

    <script src="/summernote_0.8.2/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#body').summernote({
                height:300,
            });
        });
    </script>


@stop
