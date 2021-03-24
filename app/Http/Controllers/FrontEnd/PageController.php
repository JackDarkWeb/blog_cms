<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FrontEnd\PageRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $pageRepository;

    public function __construct(PageRepositoryContract $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @param $lang
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($lang, $slug)
    {
        $page = $this->pageRepository->findBySlug($slug);

        return view("frontend.pages.page",[
            "page" => $page
        ]);
    }

    public function comment(){

        return view("frontend.comment");
    }


}
