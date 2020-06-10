@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>{{ $exercise->name }}</h2>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm">
                        <img src="{{ asset('storage/'.$exercise->src_image) }}" alt="">
                    </div>
                    <div class="col-sm">
                        <p>{{ $exercise->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
