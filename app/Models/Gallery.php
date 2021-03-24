<?php

namespace App\Models;

use App\Services\Traits\TransformationDateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, TransformationDateService;

    protected $table = "galleries";

    protected $guarded = [];

    public $timestamps = true;

    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    function getDatePostAttribute(){
        return $this->translateDate($this->created_at->format('F d, Y'));
    }



}
