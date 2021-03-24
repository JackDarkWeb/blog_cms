<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagePageFormRequest;
use App\Http\Requests\ManagePageUpdateFormRequest;
use App\Http\Requests\ManagePostFormRequest;
use App\Http\Requests\ManagePostTranslationUpdateFormRequest;
use App\Models\Post;
use App\Repositories\Contracts\BackEnd\ManagePageRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ManagePageController extends Controller
{
    protected $managePageRepository;

    public function __construct(ManagePageRepositoryContract $managePageRepository)
    {
        $this->managePageRepository = $managePageRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $pages = $this->managePageRepository->getPages();

        return view("backend.pages.index",[
            "pages" => $pages
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("backend.pages.create");
    }

    /**
     * @param ManagePageFormRequest $formRequest
     * @return RedirectResponse
     */
    public function store(ManagePageFormRequest $formRequest)
    {
        $image = null;

        if ($formRequest->file('file')){

            $image = $this->managePageRepository->treatmentImage($formRequest, "pages_images");
        }

        $post = $this->managePageRepository->create($formRequest, $image);

        $post->categories()->sync($formRequest->get("category"));

        return redirect()->route("manage-pages.index", ["lang" => app()->getLocale()])->with("message", __("validation.success", ["attribute" => __("Page")]));
    }

    /**
     * @param Post $post
     * @param $lang
     * @param $manage_page
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(Post $post, $lang, $manage_page)
    {
        $page = $this->managePageRepository->findById($manage_page);

        if (!$page)
            return back();

        return view("backend.pages.show",[
            "page" => $page
        ]);
    }

    /**
     * @param Post $post
     * @param $lang
     * @param $manage_page
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Post $post, $lang, $manage_page)
    {
        $page = $this->managePageRepository->findById($manage_page);

        if (!$page)
            return back();

        return view("backend.pages.edit",[
            "page" => $page
        ]);
    }

    /**
     * @param ManagePageUpdateFormRequest $formRequest
     * @param Post $post
     * @param $lang
     * @param $manage_page
     * @return RedirectResponse
     */
    public function update(ManagePageUpdateFormRequest $formRequest, Post $post, $lang, $manage_page)
    {
        $image = null;

        $page = $this->managePageRepository->findById($manage_page);

        if (!$page)
            return back();

        $data = filter_request($formRequest, ["is_published"]);

        if ($formRequest->hasFile("file")){

            $image = $this->managePageRepository->treatmentImage($formRequest, "posts_images");

            $data["thumbnail"] = $image;
        }

        $this->managePageRepository->update($data, $page);

        $post->categories()->sync($formRequest->get("category"));


        return redirect()->route("manage-pages.index", ["lang" => app()->getLocale()])->with("message", __("validation.update", ["attribute" => __("Page")]));
    }

    /**
     * @param Post $post
     * @param $lang
     * @param $manage_page
     * @return RedirectResponse
     */
    public function destroy(Post $post, $lang, $manage_page)
    {
        $page = $this->managePageRepository->findById($manage_page);

        if (!$page)
            return back();

        $this->managePageRepository->destroy($page);

        return redirect()->route("manage-pages.index", ["lang" => app()->getLocale()])->with("message", __("validation.destroy", ["attribute" => __("Page")]));
    }

    /**
     * @param $lang
     * @param $mange_page
     * @param $to_lang
     * @return Application|Factory|View|RedirectResponse
     */
    public function showTranslateForm ($lang, $mange_page, $to_lang){

        $page = $this->managePageRepository->findById($mange_page);

        if (!$page)
            return back();

        $translation = $page->translate($to_lang);

        return view("backend.pages.translation",[
            "page" => $page,
            "to_lang" => $to_lang,
            "translation" => $translation
        ]);
    }

    public function translateStore(ManagePostFormRequest $formRequest, $lang, $mange_page, $to_lang){

        $page = $this->managePageRepository->findById($mange_page);

        if (!$page)
            return back();

        $this->managePageRepository->createTranslate($formRequest, $page);

        return back()->with("message", __("validation.success", ["attribute" => __("Page")]));
    }

    public function translateUpdate(ManagePostTranslationUpdateFormRequest $formRequest, $lang, $mange_page, $to_lang){

        $page = $this->managePageRepository->findById($mange_page);

        if (!$page)
            return back();

        $translation = $page->translate($to_lang);

        $this->managePageRepository->updateTranslate($formRequest, $translation);

        return back()->with("message", __("validation.update", ["attribute" => __("Page")]));
    }
}
