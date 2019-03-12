<?php
/**
 * User: Master King
 * Date: 2019/3/6
 */

namespace App\Logic;

use App\Contract\BootService;
use App\Contract\LogicAbstract;

class Article extends LogicAbstract
{
    function creating(BootService $service): BootService
    {
        return $service;
    }

    function created(BootService $service): BootService
    {
        return $service;
    }

    function updated(BootService $service): BootService
    {
        return $service;
    }

    function updating(BootService $service): BootService
    {
        return $service;
    }

    function deleting(BootService $service): BootService
    {
        return $service;
    }

    function findMore(BootService $service): BootService
    {
        return $service;
    }

    function pageMore(BootService $service): BootService
    {
        $data = $service->getModelInstance($this);
        return $service;
    }

}