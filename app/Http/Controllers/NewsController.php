<?php

namespace App\Http\Controllers;

use App\Models\News;
use Exception;

class NewsController extends Controller
{
    public function show(int $id)
    {
        $news  = null;

        try {
            $news = News::findOrFail($id);

        }catch(Exception $exception){
            //todo
            error_log($exception->getMessage());
        }

        return view('news.index', [
            'news'  => $news
        ]);
    }
}
