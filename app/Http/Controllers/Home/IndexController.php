<?php

namespace App\Http\Controllers\Home;

use App\Contract\StorageService;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $rs = app('sites.abstract')->page([],10,['id'=>'desc']);
        var_dump($rs->toArray());

        return '前台主页，暂无内容';
    }



}
