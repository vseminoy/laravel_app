<?php

use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/news_categories', NewsCategoryController::class)->only([
    'index', 'show'
]);

Route::resource('news_categories.news', NewsController::class)->only([
    'show'
])->shallow();
