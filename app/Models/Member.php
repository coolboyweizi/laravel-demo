<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;

class Member extends Authenticatable
{
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

    public function fromDateTime($value)
    {
        return strtotime($value);
    }

    protected $table = 'members';
    protected $fillable = ['phone','name','password','avatar','remember_token','uuid'];
    protected $hidden = ['password','remember_token'];


}
