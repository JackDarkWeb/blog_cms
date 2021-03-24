<?php

namespace App\Models;

use App\Services\Traits\TransformationDateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory, TransformationDateService, Translatable;

    public $translatedAttributes = [
        'name',
        'slug',
    ];

    protected $guarded = [];

    public $timestamps = true;

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function posts(){

        return $this->belongsToMany(Post::class);
    }

    public function categoryTranslations(){

        return $this->hasMany(CategoryTranslation::class);
    }

    /**
     * @return mixed
     */
    function getDatePostAttribute(){
        return $this->translateDate($this->created_at->format('F d, Y'));
    }

    /**
     * @return mixed
     */
    function getShortDatePostAttribute(){
        return $this->translateDate($this->created_at->format('F Y'));
    }


    function getDayPostAttribute(){
        return $this->created_at->format('d');
    }

    function getMonthPostAttribute(){
        return $this->created_at->format('F');
    }
}
