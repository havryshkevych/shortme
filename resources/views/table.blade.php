@extends('layout')
@section('content')
    <a style="position: absolute; z-index: 1;" href="{{route('home')}}">Home</a>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="container mt-5">
            <table class="table table-light table-bordered mb-5 ">
                <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Link</th>
                    <th scope="col">Short</th>
                    <th scope="col">Visits</th>
                    <th scope="col">Created</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $data)
                    <tr class="{{$data->deleted_at ? 'table-warning' : ''}}">
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->url }}</td>
                        <td><a href="/{{$data->slug}}" target="_blank">{{ $data->slug }}</a></td>
                        <td>{{ $data->visits }}</td>
                        <td>{{ $data->created_at ? $data->created_at->diffForHumans() : ''}}</td>
                        <td>{{ $data->deleted_at ? $data->deleted_at->diffForHumans() : 'never'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $links->links() !!}
            </div>
        </div>
    </div>
@endsection
