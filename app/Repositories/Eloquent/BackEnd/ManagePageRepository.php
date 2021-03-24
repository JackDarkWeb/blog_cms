<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\Post;
use App\Repositories\Contracts\BackEnd\ManagePageRepositoryContract;
use App\Services\Traits\ImageService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ManagePageRepository implements ManagePageRepositoryContract
{
    use ImageService;

    public function getByLimit($limit = 3)
    {
        return $this->query()->orderBy("id", "DESC")
                             ->where("type", "page")
                             ->limit($limit)
                             ->get();
    }



    /**
     * @param int $page
     * @return LengthAwarePaginator|mixed
     */
    public function getPages($page = 5)
    {
        return $this->query()->where("type", "page")
                             ->paginate($page);
    }



    public function findById($id)
    {
        return $this->query()->where("id", $id)
                             ->where("type", "page")
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
            "type" => "page",
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
     * @param $page
     * @return mixed
     */
    public function destroy($page)
    {
        return $page->delete();
    }

    /**
     * @param $data
     * @param $page
     * @return mixed
     */
    public function update($data, $page)
    {
        return $page->update($data);
    }

    protected function query(){

        return Post::query();
    }


}
