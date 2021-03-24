<?php


namespace App\Repositories\Contracts\FrontEnd;


interface LanguageRepositoryContract
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @return mixed
     */
    public function settingLanguageTableExist();
}
