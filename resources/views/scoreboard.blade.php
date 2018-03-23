@extends('layouts.default')

@section('content')
    <div class="container">
        <h1 class="display-6">Scoreboard</h1><hr>
        @if(count($scores) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nickname</th>
                <th scope="col">Test</th>
                <th scope="col">Score</th>
                <th scope="col">Saved</th>
            </tr>
            </thead>
            <tbody>
            @foreach($scores as $score)
                <tr>
                    <th scope="row">{{$score['number']}}</th>
                    <td>{{$score['name']}}</td>
                    <td>{{$score['title']}}</td>
                    <td>{{$score['score']}}</td>
                    <td>{{$score['updated_at']}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @else
            <p>No score results</p>
        @endif
    </div>
@endsection
