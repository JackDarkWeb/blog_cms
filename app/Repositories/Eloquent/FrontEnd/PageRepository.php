<?php


namespace App\Repositories\Eloquent\FrontEnd;


use App\Models\Post;
use App\Repositories\Contracts\FrontEnd\PageRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PageRepository implements PageRepositoryContract
{
    /**
     * @return Builder[]|Collection|mixed
     */
    public function all()
    {
        return $this->query()->where("type", "page")
                             ->where("is_published", 1)
                             ->get();
    }
    public function findBySlug($slug)
    {
        return $this->query()->whereHas("postTranslations", function ($query) use ($slug){

            $query->where("slug", $slug);

        })->where("is_published", 1)
            ->where("type", "page")
            ->firstOrFail();
    }

    protected function query(){

        return Post::query();
    }
}
