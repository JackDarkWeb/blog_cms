<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BackEnd\ManageCategoryRepositoryContract;
use App\Repositories\Contracts\BackEnd\ManagePageRepositoryContract;
use App\Repositories\Contracts\BackEnd\ManagePostRepositoryContract;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    protected $managePostRepository;
    protected $managePageRepository;
    protected $manageCategoryRepository;

    public function __construct(ManagePostRepositoryContract $managePostRepository, ManagePageRepositoryContract $managePageRepository, ManageCategoryRepositoryContract $manageCategoryRepository)
    {
        $this->managePostRepository     = $managePostRepository;
        $this->managePageRepository     = $managePageRepository;
        $this->manageCategoryRepository = $manageCategoryRepository;
    }

    public function index(){

        $pages      = $this->managePageRepository->getByLimit();

        $posts      = $this->managePostRepository->getByLimit();

        $categories = $this->manageCategoryRepository->getByLimit();

        return view("backend.index",[
            "posts" => $posts,
            "pages" => $pages,
            "categories" => $categories
        ]);
    }
}
