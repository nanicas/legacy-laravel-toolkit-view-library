<?php

namespace Nanicas\LegacyLaravelToolkitView\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $src = __DIR__ . '/../..';

        $this->publishes([
            $src . '/resources/css' => resource_path('vendor/legacy_laravel_toolkit_view_library/css'),
            $src . '/resources/js' => resource_path('vendor/legacy_laravel_toolkit_view_library/js'),
            $src . '/resources/sass' => resource_path('vendor/legacy_laravel_toolkit_view_library/sass'),
            $src . '/resources/vendor' => resource_path('vendor/legacy_laravel_toolkit_view_library/vendor'),
                ], 'legacy_laravel_toolkit_view_library:resources');

        $this->publishes([
            $src . '/resources/views' => resource_path('views/vendor/legacy_laravel_toolkit_view_library'),
                ], 'legacy_laravel_toolkit_view_library:views');

        $this->publishes([
            $src . '/public' => public_path('vendor/legacy_laravel_toolkit_view_library')
                ], 'legacy_laravel_toolkit_view_library:public');

        $this->loadViewsFrom(
            resource_path('views/vendor/legacy_laravel_toolkit_view_library'),
            'legacy_laravel_toolkit_view_library'
        );
    }
}
