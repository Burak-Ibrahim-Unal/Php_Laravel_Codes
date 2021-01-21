@extends('layouts.app')


@section('content')

    <h1>Contact Page</h1>

    @if(count($fruits))
        <ul>

        @foreach($fruits as $fruit)

            <li>{{$fruit}}</li>

        @endforeach

        </ul>
    @endif

@stop


@section('footer')

<script>
    alert('Javascript alert...')
</script>

@stop
