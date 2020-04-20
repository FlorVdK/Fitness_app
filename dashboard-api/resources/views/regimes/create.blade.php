@extends('layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <a href="{{route('trainee', ['id' => $trainee->id])}}">{{ $trainee->name }}</a>
                </h2>
            </div>

            <form method="POST" action="{{ route('createRegime') }}">
                @csrf
                <input type="hidden" name="traine_id" id="trainee_id" value="{{ $trainee_id }}">
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="date" min="2018-01-01" max="3000-12-31" name="execution_date"
                               id="execution_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Exercise</label>
                    <select class="custom-select col-sm-8" id="inlineFormCustomSelectPref">
                        <option selected>Choose...</option>
                        @foreach($exercises as $exercise)
                            <option value="{{ $exercise->id }}">{{ $exercise->exercise_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Sets</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="description" name="description"
                               placeholder="col-form-label">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')

    <script type="text/javascript">

        $('.date').datepicker({

            format: 'mm-dd-yyyy'

        });

    </script>
@endsection

