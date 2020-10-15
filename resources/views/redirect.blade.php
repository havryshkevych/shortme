@extends('layout')
@section('content')
    <div class='body'>
        <span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </span>
        <div class='base'>
            <span></span>
            <div class='face'></div>
        </div>
    </div>
    <div class='longfazers'>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <h1>You will be redirected to <br><a id="link" href={{$link->url}}>{{$link->url}}</a><br> in
        <time><strong id="seconds">3</strong> seconds</time>
        .
    </h1>
@endsection
@section('scripts')
    <script>
        var el = document.getElementById('seconds'),
            total = el.innerHTML,
            timeinterval = setInterval(function () {
                total = --total;
                el.textContent = total;
                if (total <= 0) {
                    clearInterval(timeinterval);
                    window.location = document.getElementById('link').href;
                }
            }, 1000);
    </script>
@endsection
