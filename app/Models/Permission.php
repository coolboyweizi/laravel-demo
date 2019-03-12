<?php
namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
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

    //菜单图标
    public function icon()
    {
        return $this->belongsTo('App\Models\Icon','icon_id','id');
    }

    //子权限
    public function childs()
    {
        return $this->hasMany('App\Models\Permission','parent_id','id');
    }

}