@extends('layouts.app')
@section('content')

    <div class="container">
        <h3>Question</h3>
        <h1 style="text-align: center;">{{ $question->question->question }}</h1>
        <div class="row">
            @foreach($answers as $answer)
                <div class="col-sm-6">
                    <div class="card" id="{{ $answer->correct == 1 ? 'correct' : '' }}">
                        <div class="card-body">
                            <h5> {{ $answer->answer }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h2 id="count" style="text-align: center; margin-top: 30px;" >10</h2>
        <button type="button" class="btn btn-primary">Next question</button>
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
