<?php


namespace App\Repositories\Contracts\BackEnd;


interface ManageUserRepositoryContract
{
    /**
     * @param int $page
     * @return mixed
     */
    public function getUsers($page = 5);

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);
}
