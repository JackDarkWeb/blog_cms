<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingContactFormRequest;
use App\Http\Requests\SettingContactTranslationFormRequest;
use App\Http\Requests\SettingContactUpdateFormRequest;
use App\Http\Requests\SettingContactUpdateTranslationFormRequest;
use App\Repositories\Contracts\BackEnd\SettingContactRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingContactController extends Controller
{
    protected $settingContactRepository;

    public function __construct(SettingContactRepositoryContract $settingContactRepository)
    {
        $this->settingContactRepository = $settingContactRepository;
    }

    public function index(){

        $settingContact = $this->settingContactRepository->getUnique();

        return view("backend.setting.contact.index",[

            "settingContact" => $settingContact
        ]);
    }

    public function create(){

        $settingContact = $this->settingContactRepository->getUnique();

        if ($settingContact)
            return back();

        return view("backend.setting.contact.create");
    }

    public function store(SettingContactFormRequest $formRequest){

        $image = null;

        if ($formRequest->hasFile("file")){

            $image = $this->settingContactRepository->treatmentImage($formRequest, "contacts_images");
        }

        $this->settingContactRepository->create($formRequest, $image);

        return redirect()->route("setting-contacts.index", ["lang" => app()->getLocale()])->with("message", __("validation.success", ["attribute" => __("Content Contact")]));
    }

    public function edit($lang, $setting_contact){

        $settingContact = $this->settingContactRepository->findById($setting_contact);

        if(!$settingContact)
            return back();

        return view("backend.setting.contact.edit", [
            "settingContact" => $settingContact
        ]);
    }

    public function update(SettingContactUpdateFormRequest $formRequest){

        $image = null;

        $required_facultative_field_phone = 0;

        $data = filter_request($formRequest, ["company_name", "phone", "address", "website", "program"]);

        if($formRequest->has('required_facultative_field_phone')){

            $required_facultative_field_phone = 1;
        }

        $data["required_facultative_field_phone"] = $required_facultative_field_phone;

        if ($formRequest->hasFile("file")){

            $image = $this->settingContactRepository->treatmentImage($formRequest, "contacts_images");

            $data["thumbnail"] = $image;
        }

        $this->settingContactRepository->update($data);

        return redirect()->route("setting-contacts.index", ["lang" => app()->getLocale()])->with("message", __("validation.update", ["attribute" => __("Content Contact")]));
    }

    public function showTranslateForm($lang, $setting_contact, $to_lang){

        $contact = $this->settingContactRepository->findById($setting_contact);

        if(!$contact)
            return back();

        $translation = $contact->translate($to_lang);


        return view("backend.setting.contact.translation", [

            "contact" => $contact,
            "to_lang" => $to_lang,
            "translation" => $translation
        ]);
    }


    /**
     * @param SettingContactTranslationFormRequest $formRequest
     * @param $lang
     * @param $mange_post
     * @param $to_lang
     * @return RedirectResponse
     */
    public function translateStore(SettingContactTranslationFormRequest $formRequest, $lang, $mange_post, $to_lang){


        $contact = $this->settingContactRepository->findById($mange_post);

        if(!$contact)
            return back();

        $this->settingContactRepository->createTranslate($formRequest, $contact);

        return back()->with("message", __("validation.success", ["attribute" => __("Content Contact")]));
    }

    /**
     * @param SettingContactUpdateTranslationFormRequest $formRequest
     * @param $lang
     * @param $mange_post
     * @param $to_lang
     * @return RedirectResponse
     */
    public function translateUpdate(SettingContactUpdateTranslationFormRequest $formRequest, $lang, $mange_post, $to_lang){


        $contact = $this->settingContactRepository->findById($mange_post);

        if (!$contact)
            return back();

        $translation = $contact->translate($to_lang);

        $this->settingContactRepository->updateTranslate($formRequest, $translation);

        return back()->with("message", __("validation.update", ["attribute" => __("Content Contact")]));
    }
}
