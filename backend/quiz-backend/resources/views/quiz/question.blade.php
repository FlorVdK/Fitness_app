@extends('layouts.app')
@section('content')

    <div class="container">
        <h3>Question</h3>
        <h1 style="text-align: center;">{{ $question->question }}</h1>
        <div class="row">
        @if($question->option_c == null)
                <div class="col-sm-6">
                    <div class="card" id="{{ $question->answer == 'a' ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $question->option_a }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card" id="{{ $question->answer == 'b' ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $question->option_b }}</h5>
                        </div>
                    </div>
                </div>
        @elseif($question->option_d == null)
                <div class="col-sm-4">
                    <div class="card" id="{{ $question->answer == 'a' ? 'correct' : '' }}" >
                        <div class="card-body">
                            <h5> {{ $question->option_a }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" id="{{ $question->answer == 'b' ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $question->option_b }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" id="{{ $question->answer == 'c' ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $question->option_c }}</h5>
                        </div>
                    </div>
                </div>
        @else
                <div class="col-sm-3">
                    <div class="card" id="{{ $question->answer == 'a' ? 'correct' : '' }}" >
                        <div class="card-body">
                            <h5> {{ $question->option_a }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" id="{{ $question->answer == 'b' ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $question->option_b }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" id="{{ $question->answer == 'c' ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $question->option_c }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" id="{{ $question->answer == 'd' ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $question->option_d }}</h5>
                        </div>
                    </div>
                </div>

        @endif
        </div>
        <h2 id="count" style="text-align: center; margin-top: 30px;" >10</h2>
        <form method="post" action="{{ route('/quiz/nextquestion') }}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Next question</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        window.onload = function(){

            (function(){
                var counter = 10;

                setInterval(function() {
                    counter--;
                    if (counter >= 0) {
                        span = document.getElementById("count");
                        span.innerHTML = counter;
                    }
                    // Display 'counter' wherever you want to display it.
                    if (counter === 0) {
                        var element = document.getElementById("correct");
                        setTimeout(function () {
                            element.classList.add("bg-success");
                        }, 2000);
                        clearInterval(counter);
                    }

                }, 1000);

            })();

        }

    </script>
@endsection
