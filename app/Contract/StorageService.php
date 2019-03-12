<?php
/**
 * 图片，文件存储 接口约束
 * User: Master King
 * Date: 2019/3/4
 */

namespace App\Contract;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface StorageService
{
    /**
     * 保存文件
     * @param UploadedFile $filePath  原始文件路径
     * @param string $bucket    存储文件夹
     * @param array $options    额外选项
     * @return string           图片keyName
     */
    public function put(
        UploadedFile $filePath,
        string $bucket,
        array  $options
    ):string ;

    /**
     * 返回一个文件地址
     * @param string $key       图片唯一名
     * @return string
     */
    public function get(string $key): string ;

    /**
     * 删除一图片
     * @param string $key
     * @return bool
     */
    public function delete(string $key): bool ;

    /**
     * 图片是否存在
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool ;

    /**
     * 创建一个文件夹
     * @param string $file 文件夹名
     * @return bool
     */
    public function createBucket(string $file): bool ;

    /**
     * 删除一个文件夹
     * @param string $file 文件夹
     * @return bool
     */
    public function deleteBucket(string $file): bool ;

    /**
     * 查询图片列表
     * @return Collection
     */
    public function list(): Collection;
}