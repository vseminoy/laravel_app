<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Service\NewsCategoriesService;
use App\Service\NewsService;
use Exception;

class NewsCategoryController extends Controller
{


    public function __construct(
        private readonly NewsCategoriesService $newsCategoryService,
        private readonly NewsService           $newsService
    )
    {
    }

    public function index()
    {
        $categories = [];
        try {
            $categories = $this->newsCategoryService->getTree();
        }catch(Exception $exception){
            //todo
            error_log($exception->getMessage());
        }
        error_log(json_encode($categories));

        return view('news_category.index', [
            'categories'      => $categories,
            'news'            => []
        ]);
    }


    public function show(string $id)
    {
        $categories = [];
        $news       = [];

        try{
            $categories      = $this->newsCategoryService->getTree();
            $news            = $this->newsService->getCategoryNews($id);
        }catch(Exception $exception){
            //todo
            error_log($exception->getMessage());
        }

        return view('news_category.index', [
            'categories'      => $categories,
            'news'            => $news
        ]);
    }

}
