<?php

namespace Modules\AeroFarallonesTheme\Providers;

use App\Contracts\Modules\ServiceProvider;
use App\Services\ModuleService;

/**
 * @package $NAMESPACE$
 */
class AppServiceProvider extends ServiceProvider
{
    private $moduleSvc;

    protected $defer = false;

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->moduleSvc = app(ModuleService::class);

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        $this->registerLinks();

        // Uncomment this if you have migrations
        // $this->loadMigrationsFrom(__DIR__ . '/../$MIGRATIONS_PATH$');

        app('arrilot.widget-namespaces')->registerNamespace('Fls', 'Modules\AeroFarallonesTheme\Widgets');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }

    /**
     * Add module links here
     */
    public function registerLinks(): void
    {
        // Show this link if logged in
        // $this->moduleSvc->addFrontendLink('AeroFarallonesTheme', '/aerofarallonestheme', '', $logged_in=true);

        // Admin links:
        $this->moduleSvc->addAdminLink('AeroFarallonesTheme', '/admin/aerofarallonestheme');
    }

    /**
     * Register config.
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('aerofarallonestheme.php'),
        ], 'aerofarallonestheme');

        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'aerofarallonestheme');
    }

    /**
     * Register views.
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/aerofarallonestheme');
        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([$sourcePath => $viewPath], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/aerofarallonestheme';
        }, \Config::get('view.paths')), [$sourcePath]), 'aerofarallonestheme');
    }

    /**
     * Register translations.
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/aerofarallonestheme');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'aerofarallonestheme');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'aerofarallonestheme');
        }
    }
}
