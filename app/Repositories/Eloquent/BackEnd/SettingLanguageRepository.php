<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\SettingLanguage;
use App\Repositories\Contracts\BackEnd\SettingLanguageRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SettingLanguageRepository implements SettingLanguageRepositoryContract
{

    public function all()
    {
        return $this->query()->whereHas("settingLanguageTranslations", function ($query){
            $query->orderBy("name", "ASC");
        })->get();
    }


    /**
     * @param $request
     * @return Builder|Model|mixed
     */
    public function create($request)
    {
        $data = [
            "iso_code" => $request->get("iso_code"),

            $request->get("origin_lang") => [
                "name" => $request->get("name"),
            ],
        ];

        return $this->query()->create($data);
    }

    /**
     * @param $request
     * @param $collect
     * @return Builder|Model|mixed
     */
    public function createTranslate($request, $collect)
    {
        $data = [
            "name" => $request->get("name"),
            "locale" => $request->get("origin_lang")
        ];

        return $collect->settingLanguageTranslations()->create($data);
    }

    /**
     * @param $request
     * @param $collect
     * @return mixed
     */
    public function updateTranslate($request, $collect)
    {
        $data = [
            "name" => $request->get("name"),
        ];

        return $collect->update($data);
    }

    /**
     * @param $id
     * @return Builder|Model|mixed|object|null
     */
    public function findById($id)
    {
        return $this->query()->where("id", $id)
                             ->first();
    }

    /**
     * @param $settingLanguage
     * @return mixed
     */
    public function destroy($settingLanguage)
    {
        return $settingLanguage->delete();
    }

    /**
     * @param $data
     * @param $settingLanguage
     * @return mixed
     */
    public function update($data, $settingLanguage)
    {
        return $settingLanguage->update($data);
    }

    protected function query(){

        return SettingLanguage::query();
    }
}
