<?php

namespace App\Models;

use App\Services\Traits\TransformationDateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SettingLanguage extends Model implements TranslatableContract
{
    use HasFactory, Translatable, TransformationDateService;

    public $translatedAttributes = [
        'name'
    ];

    protected $guarded = [];

    public $timestamps = true;


    public function settingLanguageTranslations(){

        return $this->hasMany(SettingLanguageTranslation::class);
    }

    /**
     * @return mixed
     */
    function getDatePostAttribute(){
        return $this->translateDate($this->created_at->format('F d, Y'));
    }
}
