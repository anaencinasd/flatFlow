<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\GroupRequest;
use App\Models\GroupUser;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index():JsonResponse
    {
        
            $group = Group::all();
        
            return response()->json(['data' => $group], 200);
        
    }

    public function store(GroupRequest $request): JsonResponse
{
    
    $group = Group::create($request->all());

    
    $user = auth()->user();
    $groupUser = new GroupUser();
    $groupUser->id_user = $user->id;
    $groupUser->id_group = $group->id;
    $groupUser->save();

    return response()->json([
        'success' => true,
        'data' => $group
    ], 201);
}


    public function show ($id):JsonResponse
    {
        $group = Group::find($id);

        return response()->json($group, 200);
    }

    public function update(GroupRequest $request, $id):JsonResponse
    {

        $group=Group::find($id);
        $group->name=$request->name;
        $group->picprofile=$request->picprofile;
        $group->save();

        return response()->json([
            'success'=>true, 
            'data'=>$group
        ]);

    }

    public function destroy($id):JsonResponse
    {
        Group::find($id)->delete();

        return response()->json([
            'success'=>true
        ], 200);

    }

    
}
