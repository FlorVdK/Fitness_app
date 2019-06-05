@extends('layouts.app')
@section('content')

    <div class="container">
        <h3>Quizes</h3>
        @if($quizzes)
            @foreach($quizzes as $quiz)
                <h4><a href="/quiz/{{ $quiz->id }}">{{ $quiz->name }}</a></h4>
            @endforeach
        @endif
    </div>

@endsection
