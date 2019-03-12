<?php
/**
 * User: Master King
 * Date: 2019/3/6
 */

namespace App\Contract;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BootService
{
    /**
     * 添加数据
     * @param array $data
     * @return Model
     */
    public function create(array $data):Model;

    /**
     * 修改数据
     * @param array $ids
     * @param array $data
     * @return Collection
     */
    public function update(array $ids, array $data):Collection;

    /**
     * 删除数据
     * @param array $ids
     * @return bool
     */
    public function delete(array $ids):bool ;

    /**
     * 查找数据，一条
     * @param $condition
     * @return Model
     */
    public function find($condition):Model;


    /**
     * 查找数据，一条
     * @param $condition
     * @return Collection
     */
    public function findAll($condition):Collection;

    /**
     * 分页查询
     * @param array $condition
     * @param $limit
     * @param $order
     * @return LengthAwarePaginator
     */
    public function page(array $condition, $limit, $order):LengthAwarePaginator;

    /**
     * 字段自加一
     * @param $field
     * @param int $step
     * @return Model
     */
    public function increment($field, $step=1):Model;

    /**
     * 字段自减一
     * @param $field
     * @param int $step
     * @return Model
     */
    public function decrement($field, $step=1):Model;

    /**
     * @param LogicAbstract $logicAbstract
     * @return array
     */
    public function getModelInstance(LogicAbstract $logicAbstract):array ;
}