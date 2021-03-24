<?php

namespace App\Models;

use App\Services\Traits\TransformationDateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class Post extends Model implements TranslatableContract
{
    use HasFactory, TransformationDateService, Translatable;

    public $translatedAttributes = [
        'title',
        'sub_title',
        'slug',
        'details',
    ];

    protected $guarded = [];

    public $timestamps = true;

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function categories(){

        return $this->belongsToMany(Category::class);
    }

    public function postTranslations(){

        return $this->hasMany(PostTranslation::class);
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

    /**
     * @return string
     */
    public function getShortTitleAttribute(){
        return str::limit(
            $this->title, 35, '...'
        );
    }


}
