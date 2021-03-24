<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\User;
use App\Repositories\Contracts\BackEnd\ManageUserRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ManageUserRepository implements ManageUserRepositoryContract
{
    /**
     * @param int $page
     * @return LengthAwarePaginator
     */
    public function getUsers($page = 5)
    {
        return $this->query()->latest()
                             ->paginate($page);
    }

    public function findById($id)
    {
        return $this->query()->where("id", $id)
                             ->first();
    }

    /**
     * @return Builder
     */
    protected function query(){

        return User::query();
    }


}
