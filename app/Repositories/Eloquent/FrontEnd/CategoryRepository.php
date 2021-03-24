<?php


namespace App\Repositories\Eloquent\FrontEnd;


use App\Models\Category;
use App\Repositories\Contracts\FrontEnd\CategoryRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryContract
{
    /**
     * @return Builder[]|Collection|mixed
     */
    public function getCategories()
    {
        return $this->query()//->orderBy("name", "ASC")
                             ->where("is_published", 1)
                             ->get();
    }

    public function findBySlug($slug)
    {
        return $this->query()->whereHas("CategoryTranslations", function ($query) use ($slug){
                             $query->where("slug", $slug);

                        })->where("is_published", 1)
                          ->first();
    }


    protected function query(){

        return Category::query();
    }


    public function count()
    {
        return $this->query()->where("is_published", 1)
                             ->count();
    }
}
