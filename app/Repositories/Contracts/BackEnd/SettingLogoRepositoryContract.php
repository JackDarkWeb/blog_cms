<?php


namespace App\Repositories\Contracts\BackEnd;


interface SettingLogoRepositoryContract
{
    /**
     * @return mixed
     */
    public function getUnique();

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $data
     * @return mixed
     */
    public function update($data);

    /**
     * @param $request
     * @param $image
     * @return mixed
     */
    public function treatmentImage($request, string $image);
}
