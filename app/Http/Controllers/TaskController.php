<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

/*FUNCIONES DEL CONTROLADOR*/
/*DANILO ANDRÉS CARRIÓN LAVA*/

class TaskController extends Controller
{
    public function index()
    {

        /*OBTIENE TODAS LAS TAREAS*/
        $tasks = Task::all();

        /*RETORNA TODAS LAS TAREAS A LA VISTA INDEX*/
        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        /*VALIDA QUE CUMPLA LAS VALIDACIONES EL REQUEST*/
        /*
        REQUIRED: EL CAMPO ES OBLIGATORIO
        MAX: LA CADENA DEBE TENER UNA LONGITUD MÁXIMA DE 255 CARACTERES
         */
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',

        ]);

        /*REALIZAR UNA INSERCIÓN A LA BD A TRAVÉS DEL MODELO TASK */
        Task::create($validatedData);

        /*REDIRECCIONA A LA RUTA TASKS.INDEX Y SE ENVIA EN LA SESSIÓN LA VARIABLE SUCCESS */

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    public function edit(Task $task)
    {
        /*MUESTRA LA VISTA EDITAR Y SE ENVIA COMO PARAMETRO EL OBJETO TASK PARA PODER PINTARLO EN LA VISTA*/
        return view('edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

     /*VALIDA EL OBJETO TASK SEGÚN LAS REGLAS DE VALIDACIÓN*/
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'completed' => 'required',
        ]);
        
        /*REALIZA UNA ACTUALIZACION AL MODELO TASK DE ACUERDO AL OBJETO VALIDATEDATE
        LARAVEL EN SU ULTIMAS VERSIONES DE MANERA IMPLICITA REALIZA UN WHERE A LA TABLA TASKS DE ACUERDO AL ID
        */
        $task->update($validatedData);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Task $task)
    {

         /*REALIZA UNA ELIMINACION DE ACUERDO AL ID DEL MODELO TASK*/
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada correctamente.');
    }
}
