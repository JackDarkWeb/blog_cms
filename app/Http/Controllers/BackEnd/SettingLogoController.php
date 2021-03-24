<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingLogoFormRequest;
use App\Http\Requests\SettingLogoUpdateFormRequest;
use App\Repositories\Contracts\BackEnd\SettingLogoRepositoryContract;
use Illuminate\Http\Request;

class SettingLogoController extends Controller
{
    protected $settingLogoRepository;

    public function __construct(SettingLogoRepositoryContract $settingLogoRepository)
    {
        $this->settingLogoRepository = $settingLogoRepository;
    }

    public function showForm(){

        $settingLogo = $this->settingLogoRepository->getUnique();

        return view("backend.setting.logo.index",[
            "settingLogo" => $settingLogo
        ]);
    }

    public function store(SettingLogoFormRequest $formRequest){

        $logo = null;
        $active_app_name = 0;
        $active_logo = 0;

        $data = filter_request($formRequest, ["app_name"]);

        if($formRequest->has('active_app_name')){

            $active_app_name = 1;
        }

        if($formRequest->has('active_logo')){

            $active_logo = 1;
        }

        if ($formRequest->hasFile("file")){

            $logo = $this->settingLogoRepository->treatmentImage($formRequest, "logos");

            $data["logo"] = $logo;
        }

        $data["active_app_name"] = $active_app_name;
        $data["active_logo"]     = $active_logo;

        $this->settingLogoRepository->create($data);

        return back()->with("message", __("validation.success", ["attribute" => __("Logo Or App name")]));

    }

    public function update(SettingLogoUpdateFormRequest $formRequest){

        $logo = null;
        $active_app_name = 0;
        $active_logo = 0;

        $data = filter_request($formRequest, ["app_name"]);

        if($formRequest->has('active_app_name')){

            $active_app_name = 1;
        }

        if($formRequest->has('active_logo')){

            $active_logo = 1;
        }

        if ($formRequest->hasFile("file")){

            $logo = $this->settingLogoRepository->treatmentImage($formRequest, "logos");

            $data["logo"] = $logo;
        }

        $data["active_app_name"] = $active_app_name;
        $data["active_logo"]     = $active_logo;


        $this->settingLogoRepository->update($data);

        return back()->with("message", __("validation.update", ["attribute" => __("Logo Or App name")]));
    }
}
