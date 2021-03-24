<?php


use App\Repositories\Eloquent\FrontEnd\LanguageRepository;
use App\Repositories\Eloquent\FrontEnd\LogoRepository;
use App\Repositories\Eloquent\FrontEnd\PageRepository;
use App\Services\CachingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;



if (!function_exists("all_pages")){

    function all_pages(){

        return (new pageRepository())->all();
    }
}




if(!function_exists('route_name')){
    /**
     * @param $routeName
     * @param array $params
     * @return string
     */
    function route_name($routeName, $params = []){

        if (!isset($params['slug']) && !isset($params['name']) && !isset($params['id']))

            return route($routeName,['lang' => app()->getLocale()]);

        if (!isset($params['name']) && !isset($params['id']) && isset($params['slug']))
            return route($routeName, ['lang' => app()->getLocale(), 'slug' => $params['slug']]);

        if (isset($params['name']) && !isset($params['id']) && !isset($params['slug']))
            return route($routeName,['lang' => app()->getLocale(), 'name' => $params['name']]);

        if (!isset($params['name']) && isset($params['id']) && !isset($params['slug']))
            return route($routeName,['lang' => app()->getLocale(), 'id' => $params['id']]);

        return route($routeName,['lang' => app()->getLocale(), 'name' => $params['name'], 'slug' => $params['slug'], 'id' => $params['id'],]);
    }
}




if(!function_exists('menu_active')){

    function menu_active($name, $otherRoutes = []){

        $route_name = Route::currentRouteName();

        if((isset($route_name) && $route_name === $name) || (isset($route_name) && in_array($route_name, $otherRoutes)) ){

            return "active";
        }

        return "inactive";
    }
}


if(!function_exists('change_language')){

    /**
     * @param string $redirect_lang
     * @return string
     */
    function change_language(string $redirect_lang){

        $request_uri = explode('/', ($_SERVER['REQUEST_URI']));
        $request_uri[1] = $redirect_lang;

        return implode('/', $request_uri);
    }
}

if (!function_exists("app_languages")){
    /**
     * @return mixed
     */
    function app_languages(){

        $languages = (new LanguageRepository())->all();

        if ($languages->count()){

            if ($languages->contains("iso_code", "=", "en"))
                return $languages;

            else{
                $languages->push(["iso_code" => "en", "name" => "English"]);
                return  $languages;
            }
        }

        $languages->push(["iso_code" => "en", "name" => "English"]);
        return  $languages;

    }
}

if(!function_exists('active_language')){

    /**
     * @return array|Application|Translator|string|null
     */
    function active_language(){

        foreach (app_languages() as $lang){

            if (app()->getLocale() === $lang["iso_code"])

                return $lang["name"];
        }

    }
}

if (!function_exists("pattern_languages")){

    function pattern_languages(){

        if ((new LanguageRepository())->settingLanguageTableExist())

           return separator(app_languages()->pluck("iso_code"), "|");

        return "en";
    }
}

if (!function_exists("setting_logo_and_app_name")){

    function setting_logo_and_app_name(){

        $logoOrAppName = (new LogoRepository())->get();

        if ($logoOrAppName->count())

            return $logoOrAppName->get(0);

        return $logoOrAppName->push([
            "app_name" => "Blog CMS",
            "logo" => "logos/logo-circle.png",
            "active_app_name" => 1,
            "active_logo" => 1
        ])->get(0);
    }
}


if (!function_exists("menu_categories")){
    /**
     * @return mixed
     */
    function menu_categories(){

        return CachingService::dataCategoriesInCache();
    }
}



if(!function_exists('separator')){

    /**
     * @param $fields
     * @param $special_character
     * @return string
     */
    function separator($fields, $special_character = ","){

        if(gettype($fields) === 'string'){

            $fields = explode(' ', $fields);
        }

        $values = '';
        $x      = 1;

        foreach ($fields as $field){

            if(gettype($field) === 'array'){

                foreach ($field as $f){
                    $values .=  $f;

                    if($x < count($field)){

                        $values .= $special_character;
                    }
                    $x++;
                }
            }else{

                $values .=  $field;

                if($x < count($fields)){

                    $values .= $special_character;
                }
                $x++;
            }
        }

        return $values;
    }
}

if (!function_exists("filter_request")){
    /**
     * Removes empty fields
     * @param Request $request
     * @param array $attributes
     * @return array
     */
    function filter_request(Request $request, $attributes = []){

        $data = [];

        foreach ($attributes as $attribute){

            for ($row = 0; $row < count($attributes); $row++){

                if (isset($request->all()[$attribute])){

                    $data[$attribute] = $request->all()[$attribute];
                }
            }
        }
        return $data;
    }
}


if(!function_exists('plurals')){
    /**
     * @param $count
     * @param $string
     * @param bool $withNumberCount
     * @return string
     */
    function plurals($count, $string, $withNumberCount = true){

        if ($withNumberCount)
             return $count.' '.Str::plural(__($string), $count == 0 ? 1 : $count);

        return Str::plural(__($string), $count == 0 ? 1 : $count);
    }
}

if(!function_exists('pluralize')){

    /**
     * @param string $singular
     * @return string
     */
    function pluralize(string $singular){

        if($singular === 'day'){
            return 'days';
        }

        $last_letter = strtolower($singular[strlen($singular)-1]);

        switch($last_letter) {
            case 'y':
                return substr($singular,0,-1).'ies';
            case 's':
                return $singular.'es';
            default:
                return $singular.'s';
        }
    }
}

if(!function_exists('plural')){
    /**
     * @param int $count
     * @param string $singular
     * @return string
     */
    function plural(int $count, string $singular){

        if($count == 1 || $count == 0){
            $tr = __($singular);
            return "{$count} {$tr}";
        }

        $tr = __(pluralize($singular));

        return "{$count} {$tr}";
    }
}

