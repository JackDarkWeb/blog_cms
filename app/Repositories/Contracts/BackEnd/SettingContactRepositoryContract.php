<?php


namespace App\Repositories\Contracts\BackEnd;


interface SettingContactRepositoryContract
{
    /**
     * @return mixed
     */
    public function getUnique();

    /**
     * @param $setting_contact
     * @return mixed
     */
    public function findById($setting_contact);

    public function treatmentImage($request, string $folder_image);

    /**
     * @param $request
     * @param $image
     * @return mixed
     */
    public function create($request, $image);

    /**
     * @param $data
     * @return mixed
     */
    public function update($data);

    /**
     * @param $request
     * @param $collect
     * @return mixed
     */
    public function createTranslate($request, $collect);

    /**
     * @param $request
     * @param $collect
     * @return mixed
     */
    public function updateTranslate($request, $collect);

}
