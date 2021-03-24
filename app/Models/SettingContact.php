<?php

namespace App\Models;

use App\Services\Traits\TransformationDateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class SettingContact extends Model implements TranslatableContract
{
    use HasFactory,TransformationDateService, Translatable;

    public $translatedAttributes = [
        'title',
        'sub_title',
        'description',
    ];

    public $timestamps = true;

    protected $guarded = [];

    public function settingContactTranslations(){

        return $this->hasMany(SettingContactTranslation::class);
    }


    /**
     * @return mixed
     */
    function getDatePostAttribute(){
        return $this->translateDate($this->created_at->format('F d, Y'));
    }

    /**
     * @return string
     */
    public function getShortDescriptionAttribute(){
        return str::limit(
            $this->description, 35, '...'
        );
    }
}
