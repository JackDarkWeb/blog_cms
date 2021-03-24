<?php


namespace App\Repositories\Contracts\FrontEnd;


interface PageRepositoryContract
{
    /**
     * @return mixed
     */
    public function all();

    public function findBySlug($slug);
}
