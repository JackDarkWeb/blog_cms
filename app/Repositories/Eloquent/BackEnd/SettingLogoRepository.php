<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\SettingLogo;
use App\Repositories\Contracts\BackEnd\SettingLogoRepositoryContract;
use App\Services\Traits\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SettingLogoRepository implements SettingLogoRepositoryContract
{
    use imageService;

    public function getUnique()
    {
        return $this->query()->first();
    }

    /**
     * @param $data
     * @return Builder|Model|mixed
     */
    public function create($data)
    {
        return $this->query()->create($data);
    }

    /**
     * @param $data
     * @return bool|int|mixed
     */
    public function update($data)
    {
        return $this->getUnique()->update($data);
    }

    /**
     * @return Builder
     */
    protected function query(){

        return SettingLogo::query();
    }


}
