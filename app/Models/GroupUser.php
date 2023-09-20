<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;
    protected $fillable = [
         'id_group',
         'id_user',
    ];

    public function group(){
        return $this->belongsToMany(Group::class, 'id_group', 'id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'id_user', 'id');
    }


}
