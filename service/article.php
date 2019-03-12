<?php
/**
 * User: Master King
 * Date: 2019/3/6
 */
return [
    'model' => \App\Models\Article::class,
    'logic' => [
        'class' => \App\Logic\Article::class,
    ],
    'query' => [
        ['id',\Illuminate\Http\Request::capture()->input('id')],
    ],
];