<?php

namespace App\Service;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Collection;

class NewsService
{
    public function getCategoryNews(int $id):Collection{
        return News::with('user')
            ->leftJoin('news_has_categories as t', 'news.id', '=', 't.news_id')
            ->where('t.category_id', $id)
            ->orderBy('name')
            ->get();
    }
}
