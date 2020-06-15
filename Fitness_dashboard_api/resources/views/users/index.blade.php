@extends('layouts.app')

@section('content')
    @if (count($trainees) > 0)
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Current Trainees
                    <a href="/coach/make_add_trainee" class="btn btn-primary float-right">Add new trainee</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>Trainees</th>
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
