<?php
/**
 * 服务中间层
 * User: Master King
 * Date: 2019/3/6
 */

namespace App\Services;

use App\Contract\LogicAbstract;
use Illuminate\Support\Collection;
use App\Contract\BootService as Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


class BootService implements Contract
{
    /**
     * 利用类属性，保存对象实例
     * @var array
     */
    private static $logicInstance = [];

    /**
     * 该服务model层
     * @var Model
     */
    private $model = null;

    /**
     * @var Model | LengthAwarePaginator | Collection
     */
    public $modelInstance = null;

    /**
     * 异常类
     * @var int
     */
    private $exceptionCode = 0;

    /**
     * @var array
     */
    private $logic = [];

    /**
     * @param Model $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @param int $exceptionCode
     */
    public function setExceptionCode(int $exceptionCode)
    {
        $this->exceptionCode = $exceptionCode;
    }

    /**
     * @param array $logic
     */
    public function setLogic(array $logic)
    {
        $this->logic = $logic;
    }


    /**
     * 添加数据.
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        $this->modelInstance = $this->model::newModelInstance($data);
        $this->creating();
        $this->modelInstance->save();
        $this->created();
        return $this->modelInstance;
    }

    /**
     * 更新操作
     * @param array $attributes
     * @param array $values
     * @return Collection
     * @throws \Exception
     */
    public function update(array $attributes, array $values): Collection
    {
        $this->modelInstance = $this->model::where($attributes)->first();
        if (is_null($this->modelInstance)) {
            throw new \Exception("更新失败,没有找到对应数据");
        }
        $this->updating();
        $this->modelInstance->save();
        $this->updated();
        return $this->modelInstance;
    }

    public function delete(array $attributes): bool
    {
        $this->modelInstance = $this->model::where($attributes);
        $this->deleting();
        $this->modelInstance->delete();
        $this->deleted();
    }

    /**
     * 查询单挑数据
     * @param $attributes
     * @return Model
     */
    public function find($attributes): Model
    {
        $this->modelInstance = $this->model::where($attributes)->first();
        $this->findMore();
        return $this->modelInstance;
    }

    /**
     * 查找所有数据
     * @param $condition
     * @return Collection
     */
    public function findAll($condition): Collection
    {
        $this->modelInstance = $this->model::where($condition)->get();
        return $this->modelInstance;
    }

    /**
     * 分页查询
     * @param array $condition
     * @param $limit
     * @param $order
     * @return LengthAwarePaginator
     */
    public function page(array $condition, $limit, $order): LengthAwarePaginator
    {
        $this->modelInstance = $this->model::where($condition)
            //->orderBy($order)
            ->paginate($limit);
        $this->pageMore();
        return $this->modelInstance;
    }

    /**
     * 某字段自加1
     * @param $field
     * @param int $step
     * @return Model
     */
    public function increment($field, $step = 1): Model
    {
        $this->modelInstance->increment($field, $step);
        return $this->modelInstance;
    }

    /**
     * 某字段自减1
     * @param $field
     * @param int $step
     * @return Model
     */
    public function decrement($field, $step = 1): Model
    {
        return $this->modelInstance->decrement($field, $step);
    }

    /**
     * 获取数据层
     * @param LogicAbstract $logicAbstract
     * @return array
     */
    public function getModelInstance(LogicAbstract $logicAbstract): array {
        return $this->modelInstance->toArray();
    }


    /**
     * @param string $name
     * @param array $arguments
     * @return self
     */
    public function __call($name,$arguments)
    {
        $class = array_get( $this->logic,'class',null);
        $param = array_get( $this->logic,'param',[]);

        if ($class != null) {
            $instance = array_get(self::$logicInstance, $class.\GuzzleHttp\json_encode($param), null);
            if ($instance === null) {
                $instance = new $class($param);
                self::$logicInstance = array_merge(
                    self::$logicInstance,
                    [$class.\GuzzleHttp\json_encode($param)=>$instance]
                );
            }
            return $instance->$name($this);
        }
        return $this;
    }

}