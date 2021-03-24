<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingLanguageFormRequest;
use App\Http\Requests\SettingLanguageTranslationFormRequest;
use App\Http\Requests\SettingLanguageUpdateFormRequest;
use App\Repositories\Contracts\BackEnd\SettingLanguageRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingLanguageController extends Controller
{
    protected $settingLanguageRepository;

    public function __construct(SettingLanguageRepositoryContract $settingLanguageRepository)
    {
        $this->settingLanguageRepository = $settingLanguageRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $languages = $this->settingLanguageRepository->all();

        return view("backend.setting.languages.index",[
            "languages" => $languages
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("backend.setting.languages.create");
    }

    /**
     * @param SettingLanguageFormRequest $formRequest
     * @return RedirectResponse
     */
    public function store(SettingLanguageFormRequest $formRequest)
    {
        $this->settingLanguageRepository->create($formRequest);

        return redirect()->route("setting-languages.index", ["lang" => app()->getLocale()])->with("message", __("validation.success", ["attribute" => __("Language")]));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function show($id)
    {
       return back();
    }

    /**
     * @param $lang
     * @param $setting_language
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($lang, $setting_language)
    {
        $language = $this->settingLanguageRepository->findById($setting_language);

        if (!$language)
            return back();

        return view("backend.setting.languages.edit",[
            "language" => $language
        ]);
    }

    /**
     * @param SettingLanguageUpdateFormRequest $formRequest
     * @param $lang
     * @param $setting_language
     * @return RedirectResponse
     */
    public function update(SettingLanguageUpdateFormRequest $formRequest, $lang, $setting_language)
    {
        $language = $this->settingLanguageRepository->findById($setting_language);

        if (!$language)
            return back();

        $this->settingLanguageRepository->update($formRequest->all(), $language);

        return redirect()->route("setting-languages.index", ["lang" => app()->getLocale()])->with("message", __("validation.update", ["attribute" => __("Language")]));
    }

    /**
     * @param $lang
     * @param $setting_language
     * @return RedirectResponse
     */
    public function destroy($lang, $setting_language)
    {
        $settingLanguage = $this->settingLanguageRepository->findById($setting_language);

        if (!$settingLanguage)
            return back();

        $this->settingLanguageRepository->destroy($settingLanguage);

        return redirect()->route("setting-languages.index", ["lang" => app()->getLocale()])->with("message", __("validation.destroy", ["attribute" => __("Language")]));
    }

    /**
     * @param $lang
     * @param $setting_language
     * @param $to_lang
     * @return Application|Factory|View|RedirectResponse
     */
    public function showTranslateForm($lang, $setting_language, $to_lang){

        $language = $this->settingLanguageRepository->findById($setting_language);

        //dd($language, $setting_language);


        if(!$language)
            return back();

        $translation = $language->translate($to_lang);

        return view("backend.setting.languages.translation",[
            "language" => $language,
            "to_lang" => $to_lang,
            "translation" => $translation
        ]);
    }

    /**
     * @param SettingLanguageTranslationFormRequest $formRequest
     * @param $lang
     * @param $setting_language
     * @param $to_lang
     * @return RedirectResponse
     */
    public function translateStore(SettingLanguageTranslationFormRequest $formRequest, $lang, $setting_language, $to_lang){

        $language = $this->settingLanguageRepository->findById($setting_language);

        if(!$language)
            return back();

        $this->settingLanguageRepository->createTranslate($formRequest, $language);

        return back()->with("message", __("validation.success", ["attribute" => __("Language")]));
    }

    /**
     * @param SettingLanguageTranslationFormRequest $formRequest
     * @param $lang
     * @param $setting_language
     * @param $to_lang
     * @return RedirectResponse
     */
    public function translateUpdate(SettingLanguageTranslationFormRequest $formRequest, $lang, $setting_language, $to_lang){

        $language = $this->settingLanguageRepository->findById($setting_language);

        if(!$language)
            return back();

        $translation = $language->translate($to_lang);

        $this->settingLanguageRepository->updateTranslate($formRequest, $translation);

        return back()->with("message", __("validation.update", ["attribute" => __("Language")]));
    }
}
