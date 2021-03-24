<?php

namespace App\Providers;

use App\Repositories\Contracts\BackEnd\ManageCategoryRepositoryContract;
use App\Repositories\Contracts\BackEnd\ManageGalleryRepositoryContract;
use App\Repositories\Contracts\BackEnd\ManagePageRepositoryContract;
use App\Repositories\Contracts\BackEnd\ManagePostRepositoryContract;
use App\Repositories\Contracts\BackEnd\ManageUserRepositoryContract;
use App\Repositories\Contracts\BackEnd\SettingContactRepositoryContract;
use App\Repositories\Contracts\BackEnd\SettingLanguageRepositoryContract;
use App\Repositories\Contracts\BackEnd\SettingLogoRepositoryContract;
use App\Repositories\Contracts\FrontEnd\CategoryRepositoryContract;
use App\Repositories\Contracts\FrontEnd\ContactRepositoryContract;
use App\Repositories\Contracts\FrontEnd\LogoRepositoryContract;
use App\Repositories\Contracts\FrontEnd\PageRepositoryContract;
use App\Repositories\Contracts\FrontEnd\PostRepositoryContract;
use App\Repositories\Eloquent\BackEnd\ManageCategoryRepository;
use App\Repositories\Eloquent\BackEnd\ManageGalleryRepository;
use App\Repositories\Eloquent\BackEnd\ManagePageRepository;
use App\Repositories\Eloquent\BackEnd\ManagePostRepository;
use App\Repositories\Eloquent\BackEnd\ManageUserRepository;
use App\Repositories\Eloquent\BackEnd\SettingContactRepository;
use App\Repositories\Eloquent\BackEnd\SettingLanguageRepository;
use App\Repositories\Eloquent\BackEnd\SettingLogoRepository;
use App\Repositories\Eloquent\FrontEnd\CategoryRepository;
use App\Repositories\Eloquent\FrontEnd\ContactRepository;
use App\Repositories\Eloquent\FrontEnd\LogoRepository;
use App\Repositories\Eloquent\FrontEnd\PageRepository;
use App\Repositories\Eloquent\FrontEnd\PostRepository;
use Illuminate\Support\ServiceProvider;
use function Psy\bin;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PostRepositoryContract::class, PostRepository::class);
        $this->app->bind(PageRepositoryContract::class, PageRepository::class);
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(ManagePageRepositoryContract::class, ManagePageRepository::class);
        $this->app->bind(ManagePostRepositoryContract::class, ManagePostRepository::class);
        $this->app->bind(ManageGalleryRepositoryContract::class, ManageGalleryRepository::class);
        $this->app->bind(ManageCategoryRepositoryContract::class, ManageCategoryRepository::class);
        $this->app->bind(ManageUserRepositoryContract::class, ManageUserRepository::class);
        $this->app->bind(SettingLanguageRepositoryContract::class, SettingLanguageRepository::class);
        $this->app->bind(SettingLogoRepositoryContract::class, SettingLogoRepository::class);
        $this->app->bind(SettingContactRepositoryContract::class, SettingContactRepository::class);
        $this->app->bind(ContactRepositoryContract::class, ContactRepository::class);
        $this->app->bind(LogoRepositoryContract::class, LogoRepository::class);
    }
}
