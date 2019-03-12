<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model
{
    /**
     * 引入软删除
     */
    use SoftDeletes;

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

    /**
     * 格式化Unixtime
     * @param \DateTime|int $value
     * @return false|int|string
     */
    public function fromDateTime($value)
    {
        return strtotime($value);
    }

}
