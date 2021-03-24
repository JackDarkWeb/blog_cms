<?php


namespace App\Repositories\Eloquent\FrontEnd;


use App\Models\SettingContact;
use App\Repositories\Contracts\FrontEnd\ContactRepositoryContract;

class ContactRepository implements ContactRepositoryContract
{
    public function get(){

        return $this->query()->first();
    }

    protected function query(){

        return SettingContact::query();
    }
}
