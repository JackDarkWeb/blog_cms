<?php


namespace App\Repositories\Contracts\FrontEnd;


interface PostRepositoryContract
{
    /**
     * @param int $page
     * @return mixed
     */
    public function getPosts($page = 5);

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);

    /**
     * @param $slug_category
     * @param int $page
     * @return mixed
     */
    public function findByCategory($slug_category, $page = 5);
}
