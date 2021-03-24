<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagePostFormRequest;
use App\Http\Requests\ManagePostTranslationUpdateFormRequest;
use App\Http\Requests\ManagePostUpdateFormRequest;
use App\Models\Post;
use App\Repositories\Contracts\BackEnd\ManagePostRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManagePostController extends Controller
{
    protected $managePostRepository;

    public function __construct(ManagePostRepositoryContract $managePostRepository)
    {
        $this->managePostRepository = $managePostRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = $this->managePostRepository->getPosts();

        return view("backend.posts.index",[
            "posts" => $posts
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("backend.posts.create");
    }

    /**
     * @param ManagePostFormRequest $formRequest
     * @return RedirectResponse
     */
    public function store(ManagePostFormRequest $formRequest)
    {
        $image = null;

        if ($formRequest->hasFile('file')){

            $image = $this->managePostRepository->treatmentImage($formRequest, "posts_images");
        }

        $post = $this->managePostRepository->create($formRequest, $image);

        $post->categories()->sync($formRequest->get("category"));

        return redirect()->route("manage-posts.index", ["lang" => app()->getLocale()])->with("message", __("validation.success", ["attribute" => __("Post")]));
    }

    /**
     * @param Post $post
     * @param $lang
     * @param $manage_post
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(Post $post, $lang, $manage_post)
    {
        $post = $this->managePostRepository->findById($manage_post);

        if (!$post)
            return back();

        return view("backend.posts.show",[
            "post" => $post
        ]);
    }

    /**
     * @param Post $post
     * @param $lang
     * @param $manage_post
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Post $post, $lang, $manage_post)
    {
        $post = $this->managePostRepository->findById($manage_post);

        if (!$post)
            return back();

        return view("backend.posts.edit",[
            "post" => $post
        ]);
    }

    /**
     * @param ManagePostUpdateFormRequest $formRequest
     * @param Post $post
     * @param $lang
     * @param $manage_post
     * @return RedirectResponse
     */
    public function update(ManagePostUpdateFormRequest $formRequest, Post $post, $lang, $manage_post)
    {
        $image = null;

        $post = $this->managePostRepository->findById($manage_post);

        if (!$post)
            return back();

        $data = filter_request($formRequest, ["is_published"]);

        if ($formRequest->hasFile("file")){

            $image = $this->managePostRepository->treatmentImage($formRequest, "posts_images");

            $data["thumbnail"] = $image;
        }

        $this->managePostRepository->update($data, $post);

        $post->categories()->sync($formRequest->get("category"));


        return redirect()->route("manage-posts.index", ["lang" => app()->getLocale()])->with("message", __("validation.update", ["attribute" => __("Post")]));
    }

    /**
     * @param Post $post
     * @param $lang
     * @param $manage_post
     * @return RedirectResponse
     */
    public function destroy(Post $post, $lang, $manage_post)
    {
        $post = $this->managePostRepository->findById($manage_post);

        if (!$post)
            return back();

        $this->managePostRepository->destroy($post);

        return redirect()->route("manage-posts.index", ["lang" => app()->getLocale()])->with("message", __("validation.destroy", ["attribute" => __("Post")]));
    }

    /**
     * @param $lang
     * @param $mange_post
     * @param $to_lang
     * @return Application|Factory|View|RedirectResponse
     */
    public function showTranslateForm ($lang, $mange_post, $to_lang){

        $post = $this->managePostRepository->findById($mange_post);

        if (!$post)
            return back();

        $translation = $post->translate($to_lang);

        return view("backend.posts.translation",[
            "post" => $post,
            "to_lang" => $to_lang,
            "translation" => $translation
        ]);
    }

    /**
     * @param ManagePostFormRequest $formRequest
     * @param $lang
     * @param $mange_post
     * @param $to_lang
     * @return RedirectResponse
     */
    public function translateStore(ManagePostFormRequest $formRequest, $lang, $mange_post, $to_lang){

        $post = $this->managePostRepository->findById($mange_post);

        if (!$post)
            return back();

        $this->managePostRepository->createTranslate($formRequest, $post);

        return back()->with("message", __("validation.success", ["attribute" => __("Post")]));
    }

    public function translateUpdate(ManagePostTranslationUpdateFormRequest $formRequest, $lang, $mange_post, $to_lang){

        $post = $this->managePostRepository->findById($mange_post);

        if (!$post)
            return back();

        $translation = $post->translate($to_lang);

        $this->managePostRepository->updateTranslate($formRequest, $translation);

        return back()->with("message", __("validation.update", ["attribute" => __("Post")]));
    }
}
