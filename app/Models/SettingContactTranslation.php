<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingContactTranslation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = true;

    public function settingContact()
    {
        return $this->belongsTo(SettingContact::class);
    }
}
