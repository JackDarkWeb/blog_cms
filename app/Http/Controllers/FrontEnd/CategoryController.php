<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FrontEnd\CategoryRepositoryContract;
use App\Repositories\Contracts\FrontEnd\PostRepositoryContract;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $postRepository;

    public function __construct(CategoryRepositoryContract $categoryRepository, PostRepositoryContract $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository     = $postRepository;
    }

    public function showByCategory($lang, $slug){

        $category = $this->categoryRepository->findBySlug($slug);

        if (!$category)
            return back();

        $posts = $this->postRepository->findByCategory($slug);

        return view("frontend.categories.posts",[
            "category" => $category,
            "posts"    => $posts
        ]);
    }
}
