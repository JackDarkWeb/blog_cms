<?php

use App\Http\Controllers\BackEnd\ManageCategoryController;
use App\Http\Controllers\BackEnd\ManageGalleryController;
use App\Http\Controllers\BackEnd\ManagePageController;
use App\Http\Controllers\BackEnd\ManageUserController;
use App\Http\Controllers\BackEnd\OfficeController;
use App\Http\Controllers\BackEnd\ManagePostController;
use App\Http\Controllers\BackEnd\SettingContactController;
use App\Http\Controllers\BackEnd\SettingLanguageController;
use App\Http\Controllers\BackEnd\SettingLogoController;
use App\Http\Controllers\FrontEnd\CategoryController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\PageController;
use App\Http\Controllers\FrontEnd\PostController;
use App\Http\Controllers\FrontEnd\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('lang', pattern_languages());

Route::redirect('/', 'en');

Route::group(['prefix' => '{lang}'], function () {

    App::setLocale(Request::segment(1));

    Route::get("/", [HomeController::class, "index"])->name('home');

    Route::get("posts", [PostController::class, "index"])->name("posts.index");
    Route::get("posts/{slug}", [PostController::class, "showPost"])->name("posts.show");

    Route::get("category/{slug}", [CategoryController::class, "showByCategory"])->name("category.show");

    Route::get("contact", [ContactController::class, "showContactForm"])->name("contact.form");
    Route::post("contact", [ContactController::class, "submitContactForm"])->name("contact.submit");





    Route::group(['prefix' => 'office', "middleware" => "auth"], function () {

        Route::get("/", [OfficeController::class, "index"])->name('home.office');

        Route::resource("manage-posts", ManagePostController::class);
        Route::get("manage-posts/translation/{post}/to/{to_lang}", [ManagePostController::class, "showTranslateForm"])->name("translation.post");
        Route::post("manage-posts/translation/{post}/to/{to_lang}", [ManagePostController::class, "translateStore"])->name("translation.post.store");
        Route::put("manage-posts/translation/{post}/to/{to_lang}", [ManagePostController::class, "translateUpdate"])->name("translation.post.update");

        Route::resource("manage-categories", ManageCategoryController::class);
        Route::get("manage-categories/translation/{category}/to/{to_lang}", [ManageCategoryController::class, "showTranslateForm"])->name("translation.category");
        Route::post("manage-categories/translation/{category}/to/{to_lang}", [ManageCategoryController::class, "translateStore"])->name("translation.category.store");
        Route::put("manage-categories/translation/{category}/to/{to_lang}", [ManageCategoryController::class, "translateUpdate"])->name("translation.category.update");

        Route::resource("manage-galleries", ManageGalleryController::class);

        Route::resource("manage-pages", ManagePageController::class);
        Route::get("manage-pages/translation/{page}/to/{to_lang}", [ManagePageController::class, "showTranslateForm"])->name("translation.page");
        Route::post("manage-pages/translation/{page}/to/{to_lang}", [ManagePageController::class, "translateStore"])->name("translation.page.store");
        Route::put("manage-pages/translation/{page}/to/{to_lang}", [ManagePageController::class, "translateUpdate"])->name("translation.page.update");

        Route::resource("setting-languages", SettingLanguageController::class);
        Route::get("setting-languages/translation/{language}/to/{to_lang}", [SettingLanguageController::class, "showTranslateForm"])->name("translation.language");
        Route::post("setting-languages/translation/{language}/to/{to_lang}", [SettingLanguageController::class, "translateStore"])->name("translation.language.store");
        Route::put("setting-languages/translation/{language}/to/{to_lang}", [SettingLanguageController::class, "translateUpdate"])->name("translation.language.update");

        Route::get("setting-logo", [SettingLogoController::class, "showForm"])->name("setting.logo");
        Route::post("setting-logo", [SettingLogoController::class, "store"])->name("setting.logo.store");
        Route::put("setting-logo", [SettingLogoController::class, "update"])->name("setting.logo.update");

        Route::resource("setting-contacts", SettingContactController::class);
        Route::get("setting-contacts/translation/{contact}/to/{to_lang}", [SettingContactController::class, "showTranslateForm"])->name("translation.contact");
        Route::post("setting-contacts/translation/{contact}/to/{to_lang}", [SettingContactController::class, "translateStore"])->name("translation.contact.store");
        Route::put("setting-contacts/translation/{contact}/to/{to_lang}", [SettingContactController::class, "translateUpdate"])->name("translation.contact.update");

        Route::resource("manage-users", ManageUserController::class);

    });


    Route::get("comment", [PageController::class, "comment"])->name("page.comment");
    Route::get("{slug}", [PageController::class, "show"])->name("page.show");
});





Auth::routes();

