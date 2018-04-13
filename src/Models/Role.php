<?php

namespace DALTCORE\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];
    
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'pivot'
    ];

    /**
     * Get permissions that are linked to this role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
