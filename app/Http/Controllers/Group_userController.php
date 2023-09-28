<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupUser;
use App\Models\User;


class Group_userController extends Controller
{

    // public function addUserToGroup(Request $request)
    // {
    //     $groupUser = new GroupUser();
    //     $groupUser->id_user = $request->id_user;
    //     $groupUser->id_group = $request->id_group;
    //     $groupUser->save();

       
    //     return response()->json(['message' => 'Usuario añadido al grupo'], 201);
    // }

    public function addUserToGroup(Request $request, $id_group, $id_user)
{
    $groupUser = new GroupUser();
    $groupUser->id_user = $id_user;
    $groupUser->id_group = $id_group;
    $groupUser->save();

    return response()->json(['message' => 'Usuario añadido al grupo'], 201);
}

public function removeUserFromGroup($group, $user)
{
    $affectedRows = GroupUser::where('id_user', $user)
        ->where('id_group', $group)
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

    public function getUsersForGroup($groupId)
{
    $groupUsers = GroupUser::where('id_group', $groupId)->get();
    $usersId = $groupUsers->pluck('id_user');
    $usersInGroup = User::whereIn('id', $usersId)->get();

    return response()->json(['usersForGroup' => $usersInGroup]);
}


    
}
