<?php


namespace App\Services;


use App\Models\Category;
use App\Repositories\Eloquent\FrontEnd\CategoryRepository;
use Illuminate\Support\Facades\Cache;

class CachingService
{

    /**
     * @return mixed
     */
    public static function dataCategoriesInCache(){

        $oldCount = Cache::get("data_categories");

        $count    = (new CategoryRepository)->count();

        if (!$oldCount || $count > $oldCount->count()){

            Cache::forget("data_categories");
        }

        return Cache::remember('data_categories', now()->addMonths(3), function (){

            return (new CategoryRepository)->getCategories();
        });
    }
}
