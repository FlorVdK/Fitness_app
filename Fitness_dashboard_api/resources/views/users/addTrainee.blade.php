@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                All trainees
            </div>

            <div class="card-body">
                @if (count($trainees) > 0)
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

                                    @if(Auth::user()->trainees->contains('id', $trainee->id))
                                        <form action="/coach/add_trainee/{{ $trainee->id }}" method="GET">
                                            {{ csrf_field() }}

                                            <button disabled>Add</button>
                                        </form>
                                    @else

                                        <form action="/coach/add_trainee/{{ $trainee->id }}" method="GET">
                                            {{ csrf_field() }}

                                            <button>Add</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No trainees yet</p>
                @endif
            </div>
        </div>
    </div>
@endsection
