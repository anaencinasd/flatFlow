<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;


class Group extends Model
{
    use HasFactory;
    use MediaAlly;
    protected $fillable = [
        'name',
        'picprofile',
       
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'group_users', 'id_user', 'id_group');
    }

}
