<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse as HttpJsonResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    public function index():JsonResponse
    {
        
            $users = User::all();
        
            return response()->json(['data' => $users], 200);
        
    }

    public function store(UserRequest $request):JsonResponse
    {
        $user=User::create($request->all());

        return response()->json([
            'status'=>true,
            'message'=>"El usuario se ha creado correctamente",
            'token'=>$user->createToken("API TOKEN")->plainTextToken
        ], 201);
    }

    public function show ($id):JsonResponse
    {
        $user = User::find($id);

        return response()->json($user, 200);
    }

    public function update(UserRequest $request, $id):JsonResponse
    {

        $user=User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.',
            ], 404);
        }
        
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return response()->json([
            'success'=>true, 
            'data'=>$user
        ]);

    }

    public function destroy($id):JsonResponse
    {
        User::find($id)->delete();

        return response()->json([
            'success'=>true
        ], 200);

    }
    
}
