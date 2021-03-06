@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <a href="{{route('trainee', ['id' => $regime->regimeHasCoachHasTrainee->trainee_id])}}">{{ $regime->regimeHasCoachHasTrainee->trainee->name }}</a>
                </h2>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-8">
                    <p>{{ $regime->execution_date }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Exercise</label>
                <div class="col-sm-8">
                    <p><a href="{{ route('getExercise', $regime->exercise->id) }}">{{ $regime->exercise->name }}</a></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Sets</label>
                <div class="col-sm-8">
                    <p>{{ $regime->sets }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-8">
                    <p>{{ $regime->description }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Comment by coach</label>
                <div class="col-sm-8">
                    <p>{{ $regime->coach_comment }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Comment by trainee</label>
                <div class="col-sm-8">
                    <p>{{ $regime->trainee_comment }}</p>
                </div>
            </div>
            <a class="btn btn-primary" href="{{route('getRegimeEdit', ['id' => $regime->id])}}" role="button">Edit</a>
            <a class="btn btn-danger" href="{{route('deleteRegime', ['id' => $regime->id])}}" role="button">Delete</a>
        </div>
    </div>

@endsection
