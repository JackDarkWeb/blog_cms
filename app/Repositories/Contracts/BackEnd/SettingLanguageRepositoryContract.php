<?php


namespace App\Repositories\Contracts\BackEnd;


interface SettingLanguageRepositoryContract
{
    public function all();

    /**
     * @param $reques
     * @return mixed
     */
    public function create($reques);

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

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param $settingLanguage
     * @return mixed
     */
    public function destroy($settingLanguage);

    /**
     * @param $data
     * @param $settingLanguage
     * @return mixed
     */
    public function update($data, $settingLanguage);

}
