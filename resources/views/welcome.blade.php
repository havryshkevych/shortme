@extends('layout')
@section('content')
    <a style="position: absolute; z-index: 1;" href="{{route('table')}}">Table</a>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">SHORTME</h4>
                        <p class="card-form">
                            <div class="input-group md-form form-sm form-2 pl-0">
                                <input name="url" class="form-control my-0 py-1" type="text" placeholder="Enter the link here" aria-label="Enter the link here">
                                <div class="input-group-append">
                                    <button class="input-group-text red lighten-3 input-button" id="basic-text1">SHRTME</button>
                                </div>
                            </div>
                        </p>
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input name="delete_at" type="text" class="flatpickr form-control my-0 py-1" placeholder="Expire at?"  data-input>
                            <div class="input-group-append">
                                <button class="input-group-text red input-button data-clear" title="clear" data-clear>
                                    <svg style="width:15px;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M9.207 8.5l6.646 6.646-0.707 0.707-6.646-6.646-6.646 6.646-0.707-0.707 6.646-6.646-6.647-6.646 0.707-0.707 6.647 6.646 6.646-6.646 0.707 0.707-6.646 6.646z" fill="#ffffff"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @error('url')
                    <div class="card-body">
                        <h5 class="text-danger">{{$message}}</span></h5>
                    </div>
                @enderror
                @if (\Session::has('link'))
                    <div class="card-body">
                        <h5 class="card-title" id="short_url" title="click to copy">
                            <span>{{env('APP_URL', $_SERVER['HTTP_HOST'])}}/{{\Session::get('link')->slug}}</span>
                            <div class="hidden" id="copied-badge">
                                <span class="badge badge-pill badge-success">Copied</span>
                            </div>
                        </h5>
                        <span class="card-text">Lifetime {{\Session::get('link')->delete_at ? \Session::get('link')->delete_at->diffForHumans() : 'unlimited'}}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
