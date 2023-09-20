<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupUser;

class Group_userController extends Controller
{

    public function addUserToGroup(Request $request)
    {
        $groupUser = new GroupUser();
        $groupUser->id_user = $request->id_user;
        $groupUser->id_group = $request->id_group;
        $groupUser->save();

       
        return response()->json(['message' => 'Usuario añadido al grupo'], 201);
    }

    public function removeUserFromGroup(Request $request)
    {
        $affectedRows = GroupUser::where('id_user', $request->id_user)
            ->where('id_group', $request->id_group)
            ->delete();

        if ($affectedRows > 0) {
            
            return response()->json(['message' => 'Usuario eliminado del grupo'], 200);
        } else {
            
            return response()->json(['message' => 'No se encontró el registro'], 404);
        }
    }

    public function getGroupsForUser()
    {
        $user = auth()->user();
        $groups = $user->groups;

        return response()->json(['groups' => $groups]);
    }
}
