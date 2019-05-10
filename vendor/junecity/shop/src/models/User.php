<?php

namespace junecity\shop\models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                           'user_id',
                           'owner_id',
                           'name', 
                           'email', 
                           'password', 
                           'url_key', 
                           'api_token',
                           'address',
                           'address2',
                           'city',
                           'state',
                           'zip_code',
                           'phone',
                           'role',
                           ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'api_token'];



    public function Category()
    {
        return $this->hasMany('junecity\shop\models\Category');
    }
    

    public function Item()
    {
        return $this->hasMany('junecity\shop\models\Item');
    }

    public function Size()
    {
        return $this->hasMany('junecity\shop\models\Size');
    }


    public function Color()
    {
        return $this->hasMany('junecity\shop\models\Color');
    }


    public function Setting()
    {
        return $this->hasOne('junecity\shop\models\Setting');
    }

    public function Roles()
    {
        return $this->hasMany('junecity\shop\models\Role');
    }



}
