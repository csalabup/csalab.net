<?php

namespace junecity\shop;

use Illuminate\Support\ServiceProvider;

use Symfony\Component\Finder\Finder;
 
use Illuminate\Filesystem\Filesystem;

class JunecityShopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadAutoloader(base_path('packages'));
        
        if (! $this->app->routesAreCached()) {
        require __DIR__.'/../../routes/routes.php';
         }


        $this->loadViewsFrom(__DIR__.'/../../views', 'junecity');
      
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->mergeConfigFrom(
        __DIR__.'/../../config/app.php', 'junecity'
        );
    }




    protected function loadAutoloader($path)
        {
            $finder = new Finder;
            $files = new Filesystem;
 
            $autoloads = $finder->in($path)->files()->name('autoload.php')->depth('<= 3')->followLinks();
 
        foreach ($autoloads as $file)
        {
            $files->requireOnce($file->getRealPath());
        }
        }
}
