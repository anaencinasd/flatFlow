<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\TaskRequest;


class TaskController extends Controller
{
    public function index():JsonResponse
    {
        
            $task = Task::all();
        
            return response()->json(['data' => $task], 200);
        
    }

    public function store(TaskRequest $request):JsonResponse
    {
        $task=Task::create($request->all());

        return response()->json([
            'success'=>true,
            'data'=>$task
        ], 201);
    }

    public function show ($id):JsonResponse
    {
        $task = Task::find($id);

        return response()->json($task, 200);
    }

    public function update(TaskRequest $request, $id):JsonResponse
    {

        $task=Task::find($id);
        $task->title=$request->title;
        $task->description=$request->description;
        $task->id_user=$request->id_user;
        $task->id_status=$request->id_status;
        $task->save();

        return response()->json([
            'success'=>true, 
            'data'=>$task
        ]);

    }

    public function destroy($id):JsonResponse
    {
        Task::find($id)->delete();

        return response()->json([
            'success'=>true
        ], 200);

    }


}
