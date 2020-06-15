@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <a href="{{route('trainee', ['id' => $trainee->id])}}">{{ $trainee->name }}</a>
                </h2>
            </div>

            <h3>New full regime</h3>

            <form method="POST" action="{{ route('setUpFullRegime', $trainee->id) }}">
                @csrf
                <input type="hidden" name="trainee_id" id="trainee_id" value="{{ $trainee->id }}">
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Start date</label>
                    <div class="col-8">
                        <input class="form-control" type="date" id="start_date"
                               name="start_date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Difficulty</label>
                    <div class="col-8">
                        <select class="custom-select" id="difficulty" name="difficulty">
                            <option value="0">Basic</option>
                            <option value="1">Advanced</option>
                            <option value="2">Expert</option>
                            <option value="3">Master</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Exercise</label>
                    <div class="col-8">
                        <select class="custom-select" id="exercises_id" name="exercises[]" multiple required>
                            @foreach($exercises as $exercise)
                                <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="/trainee/{{ $trainee->id }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

@endsection

