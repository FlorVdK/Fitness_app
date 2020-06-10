@extends('layouts.app')

@section('content')
    @if (count($trainees) > 0)
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Trainees
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>Trainees</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($trainees as $trainee)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $trainee->name }}</div>
                                </td>

                                <td>
                                    <form action="/trainee/{{ $trainee->id }}" method="GET">
                                        {{ csrf_field() }}

                                        <button>See trainee</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
