@extends('layouts.show-data')
@section('data')
    <div class="mb-4 mt-4">
        <a class="text-decoration-none text-dark" href="{{ route('task.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left mb-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
                <span class="h5">Tasks list</span>
        </a>
    </div>
    @isset($new)
        <h4>Task #{{$task->id}} was created</h4>
    @endisset
    <div class="card ms-4" style="width: 40rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->content }}</p>
            <h6>Creator: {{ $task->user->name }}</h6>
            <h6>Status: <span> <x-status-view :status="$task->status->name"></x-status-view></span></h6>
        </div>
        <div class="card-footer w-auto">
            <form @class(['d-inline-block', 'w-100']) action="{{ route('task.edit',['task' => $task->id]) }}" method="POST">@csrf @method('GET') <button type="submit" class="btn btn-primary w-100 d-inline">Edit</button></form>
            <form @class(['d-inline-block', 'w-100']) action="{{ route('task.destroy',['task' => $task->id]) }}" method="POST">@method('DELETE') @csrf<button type="submit" class="btn btn-danger w-100 d-inline">Delete</button></form>
        </div>
    </div>
@endsection
