@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <a href="{{route('trainee', ['id' => $regime->regimeHasCoachHasTrainee->trainee_id])}}">{{ $regime->regimeHasCoachHasTrainee->trainee->name }}</a>
                </h2>
            </div>

            <form method="POST" action="{{ route('regimeEdit') }}">
                <input type="hidden" name="id" id="id" value="{{ $regime->id }}">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="date" name="date"
                               value="{{ $regime->execution_date }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Exercise</label>
                    <select class="custom-select col-sm-4" id="exercises_id" name="exercises_id">
                        @foreach($exercises as $exercise)
                            @if($exercise->id == $regime->exercise->id)
                                <option selected value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                            @else
                                <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Sets</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="sets" name="sets" value="{{ $regime->sets }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <textarea type="textarea" class="form-control"
                                  id="description" name="description" rows="4">{{ $regime->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">coach_comment</label>
                    <div class="col-sm-8">
                        <textarea type="email" class="form-control"
                                  id="coach_comment" name="coach_comment"
                                  rows="4">{{ $regime->coach_comment }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Comment by trainee</label>
                    <label class="col-sm-8 col-form-label">{{ $regime->trainee_comment }}</label>
                </div>
                <button type="submit" class="btn btn-primary">save</button>
            </form>
        </div>
    </div>

@endsection
