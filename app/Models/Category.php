<?php

namespace App\Models;

use App\Models\Base as Model;

class Category extends Model
{
    protected $table = 'article_categories';

    protected $fillable = ['name','sort','parent_id'];

    //子分类
    public function childs()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

    //所有子类
    public function allChilds()
    {
        return $this->childs()->with('allChilds');
    }

    //分类下所有的文章
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

}
