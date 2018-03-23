@extends('layouts.default')

@section('content')
    <div class="container">
        <h1 class="display-6">{{$title}}</h1><hr>
        <div class="float-right">{{$answered}} / {{$total_questions}}</div>
        {!! Form::open(['action' => ['CustomersController@update', $customer[0]->id], 'method' => 'POST']) !!}

            <h4>Question: <i>{{$question->question}}</i></h4>
            <hr>

            <ul class="list-group">
                @if(!empty($question->answer_01))
                <li class="list-group-item">
                    {{Form::radio('answer', 1, false, ['id' => 'answer_01'])}} {{ Form::label('answer_01', $question->answer_01)}}
                </li>
                @endif
                @if(!empty($question->answer_02))
                <li class="list-group-item">
                    {{Form::radio('answer', 2, false, ['id' => 'answer_02'])}} {{ Form::label('answer_02', $question->answer_02)}}
                </li>
                @endif
                @if(!empty($question->answer_03))
                <li class="list-group-item">
                    {{Form::radio('answer', 3, false, ['id' => 'answer_03'])}} {{ Form::label('answer_03', $question->answer_03)}}
                </li>
                @endif
                @if(!empty($question->answer_04))
                <li class="list-group-item">
                    {{Form::radio('answer', 4, false, ['id' => 'answer_04'])}} {{ Form::label('answer_04', $question->answer_04)}}
                </li>
                @endif
            </ul>

            {{Form::hidden('q_id', $question->id)}}
            {{Form::hidden('t_id', $question->id_test)}}
            {{Form::hidden('_method', 'PUT')}}

            <hr>
            @if($total_questions - $answered < 2)
            {{Form::submit('Finish this test!', ['class' => 'btn btn-success float-right'])}}
            @else
            {{Form::submit('Next question', ['class' => 'btn btn-primary float-right'])}}
            @endif
        {!! Form::close() !!}
    </div>
@endsection
