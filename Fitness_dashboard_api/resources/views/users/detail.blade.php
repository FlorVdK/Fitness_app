@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading row">
                <div class="col-12 col-md-8">
                    <p>{{ $trainee->name }}</p>
                    <p>{{ $trainee->email }}</p>
                </div>
                <div class="col-6 col-md-4">
                    <a href="{{route('makeNewRegime', ['id' => $trainee->id])}}" class="btn btn-primary">Add new
                        regime</a>
                    <a href="{{route('makeSetUpFullRegime', ['id' => $trainee->id])}}" class="btn btn-primary">Set up
                        full regime</a>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <th>execution_date</th>
                    <th>description</th>
                    <th>coachComment</th>
                    <th>sets</th>
                    <th>completion</th>
                    <th>exercise</th>
                    </thead>
                    <tbody>
                    @foreach ($trainee->traineeHasCoachHasTrainees->where('coach_id', '=', Auth::user()->id)->first()->regimes->sortBy('execution_date') as $regime)
                        <tr class='clickable-row' data-url='{{route('getRegime', ['id' => $regime->id])}}'>
                            <td>
                                {{ $regime->execution_date }}
                            </td>
                            <td>
                                {{ substr($regime->description, 0, 75) .'...' }}
                            </td>
                            <td>
                                {{ $regime->coach_comment }}
                            </td>
                            <td>
                                {{ $regime->sets }}
                            </td>
                            <td>
                                @if($regime->completion == 0)
                                    <i class="fas fa-times"></i>
                                @elseif($regime->completion > 0 && $regime->completion < 100)
                                    <progress id="file"
                                              value={{ $regime->completion }} max="{{ $regime->sets }}"> {{ $regime->completion }}
                                        %
                                    </progress>
                                @else
                                    <i class="fas fa-check"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('getExercise', $regime->exercise->id) }}">{{ $regime->exercise->name }}</a>
                            </td>
                            <td>
                                <a href="{{route('getRegime', ['id' => $regime->id])}}" type="button"
                                   class="btn btn-primary">detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
