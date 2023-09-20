<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'picprofile',
       
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'group_users', 'id_user', 'id_group');
    }

}
