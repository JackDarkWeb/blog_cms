<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\Category;
use App\Repositories\Contracts\BackEnd\ManageCategoryRepositoryContract;

use App\Services\Traits\ImageService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ManageCategoryRepository implements ManageCategoryRepositoryContract
{

    use ImageService;

    /**
     * @param int $page
     * @return LengthAwarePaginator|mixed
     */
    public function getCategories($page = 5)
    {
        return $this->query()->orderBy('id', 'DESC')
                             ->paginate($page);
    }

    /**
     * @param int $take
     * @return Builder[]|Collection|mixed
     */
    public function getByLimit($take = 3)
    {
        return $this->query()->orderBy('id', 'DESC')
                             ->limit($take)
                             ->get();
    }

    /**
     * @param $request
     * @param $image
     * @return Builder|Model|mixed
     */
    public function create($request, $image)
    {
        $data = [
            "user_id" => Auth::id(),
            "thumbnail" => $image,
            "is_published" => $request->get("is_published"),

            $request->get("origin_lang") => [
                "name" => $request->get("name"),
                "slug" => Str::slug($request->get("name")),
            ],
        ];

        return $this->query()->create($data);
    }

    /**
     * @param $request
     * @param $collect
     * @return Builder|Model|mixed
     */
    public function createTranslate($request, $collect)
    {
        $data = [
                "name" => $request->get("name"),
                "slug" => Str::slug($request->get("name")),
                "locale" => $request->get("origin_lang")
        ];

        return $collect->categoryTranslations()->create($data);
    }

    /**
     * @param $request
     * @param $collect
     * @return mixed
     */
    public function updateTranslate($request, $collect)
    {
        $data = [
            "name" => $request->get("name"),
            "slug" => Str::slug($request->get("name")),
        ];

        return $collect->update($data);
    }

    /**
     * @param $id
     * @return Builder|Model|mixed|object|null
     */
    public function findById($id)
    {
        return $this->query()->where("id", $id)
                             ->first();
    }

    /**
     * @param $category
     * @return mixed
     */
    public function destroy($category)
    {
        return $category->delete();
    }

    /**
     * @param $data
     * @param $category
     * @return mixed
     */
    public function update($data, $category)
    {
        return $category->update($data);
    }

    /**
     * @return Builder
     */
    protected function query(){

        return Category::query();
    }



}
