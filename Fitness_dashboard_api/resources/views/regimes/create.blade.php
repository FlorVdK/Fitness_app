@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <a href="{{route('trainee', ['id' => $trainee->id])}}">{{ $trainee->name }}</a>
                </h2>
            </div>

            <h3>New regime</h3>

            <form method="POST" action="{{ route('createRegime') }}">
                @csrf
                <input type="hidden" name="trainee_id" id="trainee_id" value="{{ $trainee->id }}">
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                    <div class="col-8">
                        <input class="form-control" type="date" id="execution_date"
                               name="execution_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Exercise</label>
                    <select class="custom-select col-sm-8" id="exercises_id" name="exercises_id">
                        <option selected>Choose...</option>
                        @foreach($exercises as $exercise)
                            <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Sets</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sets" placeholder="Sets" name="sets">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="description" name="description"
                               placeholder="Description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="comment" placeholder="Comment" name="comment">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="/trainee/{{ $trainee->id }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

@endsection

