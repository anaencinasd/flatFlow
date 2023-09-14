<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\ForumRequest;

class ForumController extends Controller
{
    public function index():JsonResponse
    {
        
            $message = Forum::all();
        
            return response()->json(['data' => $message], 200);
        
    }

    public function store(ForumRequest $request):JsonResponse
    {
        $message=Forum::create($request->all());

        return response()->json([
            'success'=>true,
            'data'=>$message
        ], 201);
    }

    public function show ($id):JsonResponse
    {
        $message = Forum::find($id);

        return response()->json($message, 200);
    }

    public function update(ForumRequest $request, $id):JsonResponse
    {

        $message=Forum::find($id);
        $message->title=$request->title;
        $message->message=$request->message;
        $message->id_user=$request->id_user;
        $message->save();

        return response()->json([
            'success'=>true, 
            'data'=>$message
        ]);

    }

    public function destroy($id):JsonResponse
    {
        Forum::find($id)->delete();

        return response()->json([
            'success'=>true
        ], 200);

    }
}
