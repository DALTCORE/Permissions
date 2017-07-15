<?php

namespace DALTCORE\Permissions;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package DALTCORE\Permissions
 * @see     http://laravel.com/docs/master/packages#service-providers
 * @see     http://laravel.com/docs/master/providers
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @see http://laravel.com/docs/master/providers#deferred-providers
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @see http://laravel.com/docs/master/providers#the-register-method
     * @return void
     */
    public function register()
    {
       //
    }

    /**
     * Application is booting
     *
     * @see http://laravel.com/docs/master/providers#the-boot-method
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        $this->registerBladeDirectives();
    }

    /**
     * Register the package migrations
     *
     * @see http://laravel.com/docs/master/packages#publishing-file-groups
     * @return void
     */
    protected function registerMigrations()
    {
        $this->publishes([
            $this->packagePath('database/migrations') => database_path('/migrations')
        ], 'dpm-migrations');
    }

    protected function registerBladeDirectives()
    {
        // Add @hasrole for Roles
        \Blade::directive('hasrole', function($role)
        {
            return "<?php if(auth()->user()->hasRole({$role})): ?>";
        });

        // Add @endhasrole for Roles
        \Blade::directive('endhasrole', function()
        {
            return "<?php endif; ?>";
        });

        // Add @haspermission for Permissions
        \Blade::directive('haspermission', function($role)
        {
            return "<?php if(auth()->user()->hasPermission({$role})): ?>";
        });

        // Add @endhaspermission for Permissions
        \Blade::directive('endhaspermission', function()
        {
            return "<?php endif; ?>";
        });
    }

    /**
     * Loads a path relative to the package base directory
     *
     * @param string $path
     *
     * @return string
     */
    protected function packagePath($path = '')
    {
        return sprintf("%s/../%s", __DIR__, $path);
    }
}
