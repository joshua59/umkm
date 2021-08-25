@extends('theme.main',["title" => "Home"])
@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <div id="content_list">
                <div id="list_result">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom_js')
    <script>
        load_list(1);
    </script>
@endsection