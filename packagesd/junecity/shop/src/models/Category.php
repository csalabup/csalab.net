<?php

namespace junecity\shop\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 
	                       'name', 
	                       'description', 
	                       'url_link', 
	                       'meta_keywords', 
	                       'meta_description',
	                       'meta_title', 
	                       'show_on_home_page', 
	                       'published', 
	                       'display_order',
	                       'include_in_top_menu'];

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

    /**
     * Get all of the category images.
     */

    public function imagers()
    {
        return $this->morphMany('junecity\shop\models\Imager', 'imageable');
    }


}
