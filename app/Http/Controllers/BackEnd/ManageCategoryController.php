<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageCategoryFormRequest;
use App\Http\Requests\ManageCategoryUpdateFormRequest;
use App\Models\Category;
use App\Repositories\Contracts\BackEnd\ManageCategoryRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManageCategoryController extends Controller
{
    protected $manageCategoryRepository;

    public function __construct(ManageCategoryRepositoryContract $manageCategoryRepository)
    {
        $this->manageCategoryRepository = $manageCategoryRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->manageCategoryRepository->getCategories();

        //dd($categories);

        return view("backend.categories.index",[
            "categories" => $categories
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("backend.categories.create");
    }

    /**
     * @param ManageCategoryFormRequest $formRequest
     * @return RedirectResponse
     */
    public function store(ManageCategoryFormRequest $formRequest)
    {
        $image = null;

        if ($formRequest->file('file')){

            $image = $this->manageCategoryRepository->treatmentImage($formRequest, "categories_images");
        }

        $this->manageCategoryRepository->create($formRequest, $image);

        return redirect()->route("manage-categories.index", ["lang" => app()->getLocale()])->with("message", __("validation.success", ["attribute" => __("category")]));
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function show(Category $category)
    {
        return back();
    }

    /**
     * @param Category $category
     * @param $lang
     * @param $manage_category
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Category $category, $lang, $manage_category)
    {
        $category = $this->manageCategoryRepository->findById($manage_category);

        if (!$category)
            return back();

        return view("backend.categories.edit",[
            "category" => $category
        ]);
    }

    /**
     * @param ManageCategoryUpdateFormRequest $formRequest
     * @param Category $category
     * @param $lang
     * @param $manage_category
     * @return RedirectResponse
     */
    public function update(ManageCategoryUpdateFormRequest $formRequest, Category $category, $lang, $manage_category)
    {
        $image = null;

        $category = $this->manageCategoryRepository->findById($manage_category);

        if (!$category)
            return back();

        $data = filter_request($formRequest, ["is_published"]);

        if ($formRequest->file("file")){

            $image = $this->manageCategoryRepository->treatmentImage($formRequest, "categories_images");

            $data["thumbnail"] = $image;
        }

        $this->manageCategoryRepository->update($data, $category);

        return redirect()->route("manage-categories.index", ["lang" => app()->getLocale()])->with("message", __("validation.update", ["attribute" => __("Category")]));

    }

    /**
     * @param Category $category
     * @param $lang
     * @param $manage_category
     * @return RedirectResponse
     */
    public function destroy(Category $category, $lang, $manage_category)
    {
        $category = $this->manageCategoryRepository->findById($manage_category);

        if (!$category)
            return back();

        $this->manageCategoryRepository->destroy($category);

        return redirect()->route("manage-categories.index", ["lang" => app()->getLocale()])->with("message", __("validation.destroy", ["attribute" => __("Category")]));
    }


    /**
     * @param $lang
     * @param $category
     * @param $to_lang
     * @return Application|Factory|View|RedirectResponse
     */
    public function showTranslateForm($lang, $category, $to_lang){

        $category = $this->manageCategoryRepository->findById($category);

        if(!$category)
            return back();

        $translation = $category->translate($to_lang);

        return view("backend.categories.translation",[
            "category" => $category,
            "to_lang" => $to_lang,
            "translation" => $translation
        ]);
    }

    /**
     * @param ManageCategoryFormRequest $formRequest
     * @param $lang
     * @param $category
     * @param $to_lang
     * @return RedirectResponse
     */
    public function translateStore(ManageCategoryFormRequest $formRequest, $lang, $category, $to_lang){

        $category = $this->manageCategoryRepository->findById($category);

        if(!$category)
            return back();

        $this->manageCategoryRepository->createTranslate($formRequest, $category);

        return back()->with("message", __("validation.success", ["attribute" => __("Category")]));
    }

    /**
     * @param ManageCategoryFormRequest $formRequest
     * @param $lang
     * @param $category
     * @param $to_lang
     * @return RedirectResponse
     */
    public function translateUpdate(ManageCategoryFormRequest $formRequest, $lang, $category, $to_lang){

        $category = $this->manageCategoryRepository->findById($category);

        if(!$category)
            return back();

        $translation = $category->translate($to_lang);

        $this->manageCategoryRepository->updateTranslate($formRequest, $translation);

        return back()->with("message", __("validation.update", ["attribute" => __("Category")]));
    }
}
