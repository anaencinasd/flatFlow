<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse as HttpJsonResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index():JsonResponse
    {
        
            $users = User::all();
        
            return response()->json(['data' => $users], 200);
        
    }

    public function store(UserRequest $request):JsonResponse
    {
        $user=User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json([
            'status'=>true,
            'message'=>"El usuario se ha creado correctamente",
            'data'=>$user,
            'token'=>$user->createToken("API TOKEN")->plainTextToken
        ], 200);
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

    public function login(Request $request)
{
    $attr = $request->validate([
        'email' => 'required|string|email|',
        'password' => 'required|string|min:6'
    ]);

    if (!Auth::attempt($attr)) {
        return response()->json([
            'message' => 'Credenciales no coinciden',
        ], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('auth_token');
    
    return response()->json([
        'access_token' => $token->plainTextToken,
        'token_type' => 'Bearer',
    ]);
}

    public function logout(Request $request)
    {
        
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json([
            'message' => 'Sesión cerrada exitosamente',
        ]);
    }
    
}
