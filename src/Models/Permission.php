<?php

namespace DALTCORE\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'pivot'
    ];
}
