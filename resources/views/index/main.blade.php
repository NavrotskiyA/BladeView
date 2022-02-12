@extends('layouts.main')

@section('UserIdentification')
    @if(!$logged)
        <h2>Hello new user</h2>
        <form action="{{ route('user.reg') }}" method="POST">
            @csrf
            <input type="submit" class="btn-primary btn" value="Sing up">
        </form>
        <form action="{{ route('user.auth') }}" method="POST">
            @csrf
            <input type="submit" class="btn-primary btn" value="Sing in">
        </form>
    @else
        <div>
            <a href="{{ route('task.create') }}" class="d-inline-block h4 text-decoration-none pt-3">
                 CREATE TASK
            </a>
            <a href="{{ route('task.index') }}" class="d-inline-block h4 text-decoration-none pt-3">
                TASKS LIST
            </a>
        </div>
    @endif
@endsection

