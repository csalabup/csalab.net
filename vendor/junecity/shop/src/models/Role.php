<?php

namespace junecity\shop\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';


    protected $fillable = [
                           'user_id',
                           'role',
                           'description'
                          ];

    /**
     * Get all of the users.
     */

	 public function User()
    {
        return $this->belongsToMany('junecity\shop\models\User');
    }

    
}
