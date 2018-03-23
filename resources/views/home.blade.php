@extends('layouts.default')

@section('content')
    <div class="">
        <div class="container">
            <h1 class="display-6">{{$title}}</h1><hr>
            @if(count($tests) > 1)
                @foreach($tests as $test)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$test['title']}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$test['created_at']}}</h6>
                            <div class="text-info">Answered: {{$test['answered']}} / {{$test['total_questions']}}</div>
                            <hr>
                            @if($test['total_questions'] - $test['answered'] > 0)
                                <a href="/public/{{$test['id']}}/" class="btn btn-primary">Try test!</a>
                            @else
                                <a href="/public/the-end/{{$test['id']}}/" class="btn btn-success">Show test result</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p>No tests found.</p>
            @endif
        </div>
    </div>


    {{--<div class="progress">--}}
        {{--<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">24%</div>--}}
    {{--</div>--}}

@endsection
