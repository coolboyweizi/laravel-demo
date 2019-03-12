<?php
namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
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
}