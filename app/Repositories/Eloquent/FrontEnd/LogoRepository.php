<?php


namespace App\Repositories\Eloquent\FrontEnd;


use App\Models\SettingLogo;
use App\Repositories\Contracts\FrontEnd\LogoRepositoryContract;

class LogoRepository implements LogoRepositoryContract
{
    public function get(){

        return $this->query()->get();
    }

    protected function query(){

        return SettingLogo::query();
    }
}
