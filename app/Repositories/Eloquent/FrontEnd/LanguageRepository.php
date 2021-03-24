<?php


namespace App\Repositories\Eloquent\FrontEnd;


use App\Models\SettingLanguage;
use App\Repositories\Contracts\FrontEnd\LanguageRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class LanguageRepository implements LanguageRepositoryContract
{
    public function all()
    {

        return $this->query()->whereHas("settingLanguageTranslations", function ($query){
            $query->orderBy("name", "ASC");
        })->get();
    }

    /**
     * @return bool|mixed
     */
    public function settingLanguageTableExist(){

        $tables = DB::select('SHOW TABLES');

        $data = [];

        foreach ($tables as $table){

            $data[] = $table->Tables_in_blog_cms;
        }

        if (in_array("setting_languages", $data))
            return true;

        return false;
    }

    /**
     * @return Builder
     */
    protected function query(){

        return SettingLanguage::query();
    }
}
