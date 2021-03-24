<?php


namespace App\Repositories\Eloquent\FrontEnd;


use App\Models\Post;
use App\Repositories\Contracts\FrontEnd\PostRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PostRepository implements PostRepositoryContract
{
    /**
     * @param int $page
     * @return LengthAwarePaginator|mixed
     */
    public function getPosts($page = 5)
    {
        return $this->query()->orderBy('id', 'DESC')
                             ->where("is_published", 1)
                             ->where("type", "post")
                             ->paginate($page);
    }

    public function findByCategory($slug_category, $page = 5)
    {
        return $this->query()->whereHas("categories", function ($query) use ($slug_category){

                                   $query->whereHas("categoryTranslations", function ($query) use ($slug_category){

                                       $query->where("slug", $slug_category);

                                   })->where("is_published", 1);


                              })->orderBy('id', 'DESC')
                                ->where("is_published", 1)
                                ->where("type", "post")
                                ->paginate($page);
    }

    /**
     * @param $slug
     * @return Builder|Model|mixed|object|null
     */
    public function findBySlug($slug)
    {
        return $this->query()->whereHas("postTranslations", function ($query) use ($slug){

                             $query->where("slug", $slug);

                            })->where("is_published", 1)
                              ->where("type", "post")
                              ->first();
    }

    /**
     * @return Builder
     */
    protected function query(){

        return Post::query();
    }



}
