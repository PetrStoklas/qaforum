@extends('questions/layout')

@section('content')



<section id="banner">
    <div class="container">
        <h1>Questions</h1>
    </div>
</section>

<section id="questions">
    <div class="container">

        @foreach ($all_questions as $question)

        <div class="question">
            <div class="question-left">
                <div class="question-stat">
                    <span>{{ $question->answers()->count() }}</span>
                    <label>responses</label>
                </div>
                <div class="question-stat">
                <span>x</span>
                    <label>votes</label>
                </div>
            </div>
            <div class="question-right">
                <div class="question-name">
                <a href="questions/{{ $question->id }}">{{ $question->title }}</a>
                </div>
                <div class="question-info">
                    asked at {{ $question->created_at }} by <a href="">slavo</a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</section>

@endsection