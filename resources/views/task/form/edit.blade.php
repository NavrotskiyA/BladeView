@extends('layouts.form')

@section('form')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card w-25">
        <form action="{{ route('task.update',['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <h5 class="card-title">Updating task #{{ $task->id }}</h5>
                <div class="input-group">
                    <span class="input-group-text">Title</span>
                    <input type="text" name="title" class="form-control" value="{{ $task->title }}">
                </div>
                <div class="form-floating">
                    <textarea name="content" class="form-control form-floating-height-2" style="height: 20rem" placeholder="A" id="floatingTextarea">{{ $task->content }}</textarea>
                    <label for="floatingTextarea">Content</label>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Status: </span>
                    <select name="status_id" class="form-select" id="statusInputGroupSelect">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}" @if($task->status_id == $status->id) selected @endif>{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input class="btn btn-primary mt-3" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
