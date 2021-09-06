<?php

namespace yudijohn\Metronic\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [ 'name', 'slug', 'permissions', 'can_deleted', 'is_super' ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [ 'permissions' => 'array' ];

    /**
     * The users that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany( \App\Models\User::class, 'roles_users', 'role_id', 'user_id' );
    }
}