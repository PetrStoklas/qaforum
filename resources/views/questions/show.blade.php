@extends('questions/layout')


@section('content')

    @include('common/errors')
    @include('common/alerts')

    <section id="banner" class="banner-sm">
        <div class="container">
            <h1>Questions</h1>
        </div>
    </section>


    <h1> ANSWER FORM </h1>
    @auth
    {!! Form::open(['route' => ['answer.store', $question->id], 'method' => 'post']) !!}
    
        <div class="form-group">
            <label for="">Your answer:</label><br>
            {!! Form::textarea('text', $answer->text, ['class' => 'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    
    {!! Form::close() !!}
    @endauth

    <section id="question">

        <button type="submit"></button>

        <div class="container">
            <div class="question-left">
                <div class="user-avatar">
                    <img class="img-fluid"
                        src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png"/>
                </div>
                <div class="user-name">Mick Jagger</div>
                <div class="user-stats">
                    <div class="user-stat">
                        <span>3</span>
                        <label>responses</label>
                    </div>
                    <div class="user-stat">
                        <span>5</span>
                        <label>votes</label>
                    </div>
                </div>

            </div>
            <div class="question-right">
                <h2> {{ $question->title }} </h2>
                <p> {{ $question->text }} </p>
            </div>
        </div>
    </section>

    <section id="answers">

        <div class="container">
            <h2>12 Answers</h2>
            
            @foreach($question->answers as $answer)
            <div class="answer">
                <div class="answer-left">
                    <div class="user-avatar">
                        <img class="img-fluid"
                            src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png"/>
                    </div>
                    <div class="user-name">John Doe</div>
                    <div class="user-stats">
                        <div class="user-stat">
                            <span>3</span>
                            <label>responses</label>
                        </div>
                        <div class="user-stat">
                            <span>5</span>
                            <label>votes</label>
                        </div>
                    </div>
                </div>
                <div class="answer-right">
                    <p> {{ $answer->text }} </p>
                </div>
                @can('admin')
                    <button> Delete </button>    
                @endcan
            </div>
            @endforeach
        </div>

    </section>

@endsection