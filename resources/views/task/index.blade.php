@extends('layouts.app')

@section('content')

<ul>
    @forelse ($tasks as $task)
    <li><a href="#"></a>{{$task->title}}</li>
        
    @empty
    <p>No data.</p>
        
    @endforelse
</ul>

@endsection