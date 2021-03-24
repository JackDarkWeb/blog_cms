<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FrontEnd\PostRepositoryContract;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(){

        return view("frontend.posts.posts");
    }

    public function showPost($lang, $slug){

        $post = $this->postRepository->findBySlug($slug);

        if (!$post)
            return back();

        return view("frontend.posts.single",[
            "post" => $post
        ]);
    }
}
