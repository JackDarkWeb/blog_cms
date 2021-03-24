<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Repositories\Contracts\BackEnd\ManageGalleryRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManageGalleryController extends Controller
{
    protected $manageGalleryRepository;

    public function __construct(ManageGalleryRepositoryContract $manageGalleryRepository)
    {
        $this->manageGalleryRepository = $manageGalleryRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $galleries = $this->manageGalleryRepository->getGalleries();

        return view("backend.galleries.index",[
            "galleries" => $galleries
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("backend.galleries.create");
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->manageGalleryRepository->treatmentMultipleImages($request, $this->manageGalleryRepository, "galleries");

        //return redirect()->route("manage-galleries.index", ["lang" => app()->getLocale()])->with("message", __("validation.success", ["attribute" => __("Gallery")]));
    }

    /**
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function show(Gallery $gallery)
    {
        return back();
    }

    /**
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function edit(Gallery $gallery)
    {
        return back();
    }

    /**
     * @param Request $request
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function update(Request $request, Gallery $gallery)
    {
        return back();
    }

    /**
     * @param Gallery $gallery
     * @param $lang
     * @param $manage_gallery
     * @return RedirectResponse
     */
    public function destroy(Gallery $gallery, $lang, $manage_gallery)
    {
        $gallery = $this->manageGalleryRepository->findById($manage_gallery);


        if (!$gallery)
            return back();

        $this->manageGalleryRepository->destroy($gallery);

        return redirect()->route("manage-galleries.index", ["lang" => app()->getLocale()])->with("message", __("validation.destroy", ["attribute" => __("Image")]));
    }
}
