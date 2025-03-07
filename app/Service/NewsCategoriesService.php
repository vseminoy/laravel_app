<?php

namespace App\Service;
use App\Models\NewsCategory;
use Illuminate\Support\Collection;

class NewsCategoriesService
{
    public function getTree():Collection{
        return NewsCategory::with('user')
            ->orderBy('lft')
            ->get();
    }
}
