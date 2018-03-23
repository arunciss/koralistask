@extends('layouts.default')

@section('content')
    <div class="container">
        <h1 class="display-6 text-success">{{$title}}</h1><hr>
        <h3>Your score is: <b>{{$customer[0]->score}}</b> <span class="small">(max score: <b>{{$maxScore}}</b>)</span></h3><hr>

        {!! Form::open(['action' => ['CustomersController@save', $customer[0]->id], 'method' => 'POST']) !!}

        @if(!$customer[0]->status)
        <div class="form-group">
            {{Form::label('nickname', 'If you want you can save your score:')}}
            {{Form::text('nickname', '', ['class' => 'form-control', 'placeholder' => 'Insert nick...'])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}

        {{Form::submit('Save my score!', ['class' => 'btn btn-warning float-left'])}}
        @endif

        {!! Form::close() !!}

        {!! Form::open(['action' => ['CustomersController@destroy', $customer[0]->id], 'method' => 'POST', 'class' => 'float-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}

            {{Form::submit('No! I want try again.', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}

        <div class="clear"></div>
        <hr>
        <h1 class="text-center text-danger">Questions with correct and bad answered</h1>
        @foreach($results as $result)
            <h3 class="text-info">[{{$result['number']}}/{{$total}}] {{$result['question']}}</h3>
            <ul class="list-group">
                <li class="list-group-item {{$result['s1']}}">
                    {{$result['a1']}}
                </li>
                <li class="list-group-item {{$result['s2']}}">
                    {{$result['a2']}}
                </li>
                <li class="list-group-item {{$result['s3']}}">
                    {{$result['a3']}}
                </li>
                <li class="list-group-item {{$result['s4']}}">
                    {{$result['a4']}}
                </li>
            </ul>
            <hr>
        @endforeach
    </div>
@endsection
