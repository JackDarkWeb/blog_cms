<?php


namespace App\Repositories\Contracts\FrontEnd;


interface CategoryRepositoryContract
{
    /**
     * @return mixed
     */
    public function count();
    /**
     * @return mixed
     */
    public function getCategories();

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}
