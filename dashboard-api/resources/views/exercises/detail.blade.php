@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>{{ $exercise->exercise_name }}</h2>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm">
                    </div>
                    <div class="col-sm">
                        <p>{{ $exercise->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
