<?php

namespace junecity\shop\models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    


    protected $table = 'sizes';


    protected $fillable = [
                           'size',
                           'description'
                          ];

    /**
     * Get all of the users.
     */

	 public function User()
    {
        return $this->belongsTo('junecity\shop\models\User');
    }

    /**
     * Get all of the items.
     */

    public function Item()
    {
        return $this->belongsToMany('junecity\shop\models\Item');
    }

    
}
