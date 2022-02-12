@extends('layouts.show-data')

@section('data')
    <div class="list-group w-50">
        <h4>Tasks list</h4>
        @foreach($tasks as $task)
            <a href="{{ route('task.show',['task' => $task]) }}" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 align-left">{{ $task->title }}</h5>
                    <small>{{ $task->created_at }}</small>
                </div>
            </a>
        @endforeach
    </div>
@endsection
