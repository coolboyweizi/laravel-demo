<?php
/**
 * 本地图片上传
 * User: Master King
 * Date: 2019/3/4
 */

namespace App\Services;


use App\Contract\StorageService as Contract;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class StorageLocal implements Contract
{
    public function put(UploadedFile $file,
                        string $bucket,
                        array $options): string
    {
        try {
            $this->createBucket($bucket);
            $name = array_get($options,'name',$this->guessName($file));
            return Storage::disk()->putFileAs($bucket, $file, $name);
        }catch (\Exception $exception){
            throw new \Exception("上传失败:".$exception->getMessage(),10000);
        }
    }


    public function get(string $key): string
    {
        if ($this->has($key)) {
            return Storage::disk()->url($key);
        }else {
            return env('APP_URL').'/default.png';
        }
    }

    public function delete(string $key): bool
    {
        return Storage::disk()->delete($key);
    }

    public function has(string $key): bool
    {
        return Storage::disk()->exists($key);
    }

    public function createBucket(string $file): bool
    {
        return Storage::disk()->makeDirectory($file);
    }

    public function deleteBucket(string $file): bool
    {
        return Storage::disk()->deleteDirectory($file);
    }

    public function list(): Collection
    {
        // TODO: Implement list() method.
    }

    /**
     * 创建新名字
     * @param UploadedFile $file
     * @return string
     */
    protected function guessName(UploadedFile $file){
        return  Carbon::now()->format('y-m-d-h-i-s').'-'.rand(1000,9999).'.'.$file->guessClientExtension();
    }

}