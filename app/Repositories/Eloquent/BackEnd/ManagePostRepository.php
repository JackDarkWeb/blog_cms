<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\Post;
use App\Repositories\Contracts\BackEnd\ManagePostRepositoryContract;
use App\Services\Traits\ImageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ManagePostRepository implements ManagePostRepositoryContract
{
    use ImageService;

    public function getPosts($page = 5)
    {
        return $this->query()->orderBy("id", "DESC")
            ->where("type", "post")
            ->paginate($page);
    }

    public function getByLimit($take = 3)
    {
        return $this->query()->orderBy("id", "DESC")
                             ->where("type", "post")
                             ->take($take)
                             ->get();
    }


    public function findById($id)
    {
        return $this->query()->where("id", $id)
                             ->where("type", "post")
                             ->first();
    }

    public function findBySlug($slug)
    {
        // TODO: Implement findBySlug() method.
    }

    public function create($request, $image)
    {
        $data = [
            "user_id" => Auth::id(),
            "thumbnail" => $image,
            "type" => "post",
            "is_published" => $request->get("is_published"),

            $request->get("origin_lang") => [
                "title" => $request->get("title"),
                "sub_title" => $request->get("sub_title"),
                "slug" => Str::slug($request->get("title")),
                "details" => $request->get("details"),
            ],
        ];

        return $this->query()->create($data);
    }

    public function createTranslate($request, $collect)
    {
        $data = [
            "title" => $request->get("title"),
            "sub_title" => $request->get("sub_title"),
            "slug" => Str::slug($request->get("title")),
            "details" => $request->get("details"),
            "locale" => $request->get("origin_lang")
        ];

        return $collect->postTranslations()->create($data);
    }

    public function updateTranslate($request, $collect)
    {
        $data = filter_request($request, ["title", "sub_title", "details"]);

        $data["slug"] = Str::slug($request->get("title"));

        return $collect->update($data);
    }

    /**
     * @param $post
     * @return mixed
     */
    public function destroy($post)
    {
        return $post->delete();
    }

    public function update($data, $post)
    {
        return $post->update($data);
    }


    protected function query(){

        return Post::query();
    }



}
