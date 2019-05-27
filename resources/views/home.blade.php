@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($unsolvedTasks as $task)
                <div class="card">
                    <div class="card-header">{{ $task->name }}</div>
                    <div class="card-body">
                        <p>{{ $task->text }}</p>
                        <form method="POST">
                            @csrf
                            <input type="text" name="answer" placeholder="Ответ">
                            <input type="hidden" name="task_id" value ={{ $task->id }}>
                            <input type="submit" value="Отправить">
                        </form>
                    </div>
                </div>
            @endforeach
            @foreach ($solvedTasks as $task)
                <div class="card">
                    <div class="card-header">{{ $task->name }}</div>
                    <div class="card-body">
                        <p>{{ $task->text }}</p>
                        <p style="font-weight:bold;color:green;">Задача решена!!! Правильный ответ: {{$task->flag}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
