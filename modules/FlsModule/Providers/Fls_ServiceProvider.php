<?php

namespace Modules\FlsModule\Providers;

use App\Services\ModuleService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\FlsModule\Http\Controllers\Fls_CustomPagesController;

class Fls_ServiceProvider extends ServiceProvider
{
    protected $moduleSvc;

    // Boot the application events
    public function boot()
    {
        $this->moduleSvc = app(ModuleService::class);

        $this->registerRoutes();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerLinks();

        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');

        app('arrilot.widget-namespaces')->registerNamespace('FlsModule', 'Modules\FlsModule\Widgets');
    }

    // Service Providers
    public function register()
    {
    }

    // Module Links
    public function registerLinks()
    {
        $this->moduleSvc->addAdminLink('Fls Basic', '/admin/FlsModule', 'pe-7s-tools');
    }

    // Routes
    protected function registerRoutes()
    {
        // Frontend
        Route::group([
            'as'         => 'FlsModule.',
            'middleware' => ['web', 'auth'],
            'namespace'  => 'Modules\FlsModule\Http\Controllers',
            'prefix'     => '',
        ], function () {
            // Custom pages
            Route::get('fls-aircraft/{icao}', 'Fls_CustomPagesController@index')->name('custom.aircraft');
            // Airlines
            Route::get('fairlines', 'Fls_AirlineController@index')->name('airlines');
            Route::get('fairlines/{icao}', 'Fls_AirlineController@show')->name('airline');
            Route::get('fairline/{id}', 'Fls_AirlineController@myairline')->name('myairline');
            // Awards
            Route::get('fawards', 'Fls_AwardController@index')->name('awards');
            // Fleet
            Route::get('ffleet', 'Fls_FleetController@index')->name('fleet');
            Route::get('ffleet/{subfleet_type}', 'Fls_FleetController@subfleet')->name('subfleet');
            Route::get('faircraft/{ac_reg}', 'Fls_FleetController@aircraft')->name('aircraft');
            // Hubs
            Route::get('fhubs', 'Fls_HubController@index')->name('hubs');
            Route::get('fhubs/{icao}', 'Fls_HubController@show')->name('hub');
            // News
            Route::get('fnews', 'Fls_NewsController@index')->name('news');
            // Ranks
            Route::get('franks', 'Fls_RankController@index')->name('ranks');
            // Roster
            Route::get('froster', 'Fls_RosterController@index')->name('roster');
            // Pages
            Route::get('flivewx', 'Fls_PageController@livewx')->name('livewx');
            // Pireps
            Route::get('fpireps', 'Fls_PirepController@index')->name('pireps');
            // Stable Approach
            Route::get('fstable', 'Fls_StableApproachController@index')->name('stable');
            // Statistics
            Route::get('fstats', 'Fls_StatisticController@index')->name('stats');
            // Widgets
            Route::match(['get', 'post'], 'fjumpseat', 'Fls_WidgetController@jumpseat')->name('jumpseat');
            Route::match(['get', 'post'], 'ftransferac', 'Fls_WidgetController@transferac')->name('transferac');
        });

        // Frontend Public
        Route::group([
            'as'         => 'FlsModule.',
            'middleware' => ['web'],
            'namespace'  => 'Modules\FlsModule\Http\Controllers',
            'prefix'     => '',
        ], function () {
            // Public Pages (for IVAO/VATSIM Audits)
            Route::get('freports', 'Fls_PirepController@index')->name('reports');
            Route::get('fstatistics', 'Fls_StatisticController@index')->name('statistics');
            // Plain Pages
            Route::get('fls_roster', 'Fls_WebController@roster')->name('dp_roster');
            Route::get('fls_stats', 'Fls_WebController@stats')->name('dp_stats');
            Route::get('fls_page', 'Fls_WebController@page')->name('dp_page');
            Route::get('fls_pireps', 'Fls_WebController@pireps')->name('dp_pireps');
        });

        // API Public
        Route::group([
            'as'         => 'FlsModule.',
            'middleware' => ['api'],
            'namespace'  => 'Modules\FlsModule\Http\Controllers',
            'prefix'     => '',
        ], function () {
            // Stable Approach Plugin Report
            Route::post('dstable/new', 'Fls_StableApproachController@store');
        });

        // Admin
        Route::group([
            'as'         => 'FlsModule.',
            'middleware' => ['web', 'auth', 'ability:admin,admin-access'],
            'namespace'  => 'Modules\FlsModule\Http\Controllers',
            'prefix'     => 'admin',
        ], function () {
            // Custom
            Route::get('FlsModule/blog', 'Fls_CustomPagesController@index')->name('admin.blog');
            //Default
            Route::get('FlsModule', 'Fls_AdminController@index')->name('admin')->middleware('ability:admin,addons,modules');
            Route::get('fcheck', 'Fls_AdminController@health_check')->name('health_check')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'fsettings_update', 'Fls_AdminController@settings_update')->name('settings_update')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'fpark_aircraft', 'Fls_AdminController@park_aircraft')->name('park_aircraft')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'fspecs', 'Fls_SpecController@index')->name('specs')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'fspecs_store', 'Fls_SpecController@store')->name('specs_store')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'ftech', 'Fls_TechController@index')->name('tech')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'ftech_store', 'Fls_TechController@store')->name('tech_store')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'frunway', 'Fls_RunwayController@index')->name('runway')->middleware('ability:admin,addons,modules');
            Route::match(['get', 'post'], 'frunway_store', 'Fls_RunwayController@store')->name('runway_store')->middleware('ability:admin,addons,modules');
            Route::post('fstable/update', 'Fls_StableApproachController@update')->name('stable_update')->middleware('ability:admin,addons,modules');
            Route::post('fmanual_award', 'Fls_AdminController@manual_award')->name('manual_award')->middleware('ability:admin,addons,modules');
            Route::post('fmanual_payment', 'Fls_AdminController@manual_payment')->name('manual_payment')->middleware('ability:admin,addons,modules');
        });
    }

    // Config
    protected function registerConfig()
    {
        $this->publishes([__DIR__ . '/../Config/config.php' => config_path('FlsModule.php'),], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'FlsModule');
    }

    // Translations
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/FlsModule');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'FlsModule');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'FlsModule');
        }
    }

    // Views
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/FlsModule');
        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([$sourcePath => $viewPath,], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/FlsModule';
        }, \Config::get('view.paths')), [$sourcePath]), 'FlsModule');
    }

    public function provides(): array
    {
        return [];
    }
}
