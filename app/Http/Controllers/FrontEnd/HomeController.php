<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FrontEnd\PostRepositoryContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getPosts();

        return view('frontend.welcome',[
            "posts" => $posts
        ]);
    }
}
