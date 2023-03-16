@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tareas</div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="p-1">
                        <div>
                            <span class="badge rounded-pill bg-success">{{session('success')}}</span>
                        </div>
                    </div>
                    @endif
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Agregar tarea</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    @if($task->completed)
                                    <span class="badge bg-success">Realizado</span>
                                    @else
                                    <span class="badge bg-secondary">No realizado</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="btn btn-primary btn-sm me-2">Editar</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection