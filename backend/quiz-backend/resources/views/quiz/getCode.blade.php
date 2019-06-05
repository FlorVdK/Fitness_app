@extends('layouts.app')
@section('content')

    <div class="container">
        <h3>{{ $quiz->name }}</h3>

        <button id="getCode">Get Quizcode</button>
        <p id="quizcode" style="margin-top: 5px; display: none;">{{ $quizCode }}</p>
        <form method="post" action="{{ route('/quiz/start') }}"
              enctype="multipart/form-data" class="text-center border border-light">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $quizCode }}" id="quizCode" name="quizCode">
            <input type="hidden" value="{{ $quiz->id }}" id="quizId" name="quizId">
            <button id="start" style="margin-top: 5px; display: none;">Start</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        $('#getCode').click(function (e) {
            $('#quizcode').css('display', 'block');
            $('#start').css('display', 'block');
            $('#getCode').attr("disabled", true);
        });
    </script>
@endsection
