<?php
/**
 * User: Master King
 * Date: 2019/3/6
 */

namespace App\Contract;


abstract class LogicAbstract
{
    // create
    abstract function creating(BootService $service):BootService;
    abstract function created(BootService $service):BootService;

    // update
    abstract function updated(BootService $service):BootService;
    abstract function updating(BootService $service):BootService;

    // delete
    abstract function deleting(BootService $service):BootService;

    // find
    abstract function findMore(BootService $service):BootService;

    // page
    abstract function pageMore(BootService $service):BootService;

    // callback
    final public function __call($name, $arguments)
    {
       return $arguments;
    }
}