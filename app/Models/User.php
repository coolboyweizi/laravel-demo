<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * 指定删除字段
     */
    const DELETED_AT = 'deleted';

    /**
     * 指定添加字段
     */
    const CREATED_AT = 'created';

    /**
     * 指定更新字段
     */
    const UPDATED_AT = 'updated';


    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','phone','uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fromDateTime($value)
    {
        return strtotime($value);
    }

}
