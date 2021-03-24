<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLanguageTranslation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $guarded = [];

    public function settingLanguage()
    {
        return $this->belongsTo(SettingLanguage::class);
    }
}
