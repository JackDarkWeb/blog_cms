<?php


namespace App\Repositories\Eloquent\BackEnd;


use App\Models\SettingContact;
use App\Repositories\Contracts\BackEnd\SettingContactRepositoryContract;
use App\Services\Traits\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class SettingContactRepository implements SettingContactRepositoryContract
{

    use ImageService;

    public function getUnique()
    {
        return $this->query()->first();
    }

    public function findById($setting_contact){

        return $this->query()->where("id", $setting_contact)->first();
    }

    /**
     * @param $request
     * @param $image
     * @return Builder|Model
     */
    public function create($request, $image){


        $data = [

            "thumbnail" => $image,
            "company_name" => $request->get("company_name"),
            "address" => $request->get("address"),
            "phone" => $request->get("phone"),
            "website" => $request->get("website"),
            "program" => $request->get("program"),
            "required_facultative_field_phone" => $request->get("required_facultative_field_phone") ?? 0,

            $request->get("origin_lang") => [
                "title" => $request->get("title"),
                "sub_title" => $request->get("sub_title"),
                "description" => $request->get("description"),
            ],
        ];
        return $this->query()->create($data);
    }

    /**
     * @param $data
     * @return bool|int
     */
    public function update($data){

        return $this->getUnique()->update($data);
    }

    public function createTranslate($request, $collect){

        $data = [
            "title" => $request->get("title"),
            "sub_title" => $request->get("sub_title"),
            "description" => $request->get("description"),
            "locale" => $request->get("origin_lang")
        ];

        return $collect->settingContactTranslations()->create($data);
    }

    public function updateTranslate($request, $collect)
    {
        $data = filter_request($request, ["title", "sub_title", "description"]);

        return $collect->update($data);
    }



    protected function query(){

        return SettingContact::query();
    }


}
