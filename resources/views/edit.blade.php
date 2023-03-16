@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar tarea</div>
                <div class="card-body">
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" value="{{$task->title}}" class="form-control" id="title" name="title"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description"
                                name="description" rows="3" required>{{$task->description}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="completed" class="form-label">Estado</label>
                            <select class="form-control" name="completed" id="completed" required>
                                <option value="1" {{ $task->completed == 1 ? 'selected' : ''}} >REALIZADO</option>
                                <option value="0" {{ $task->completed == 0 ? 'selected' : ''}} >NO REALIZADO</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection