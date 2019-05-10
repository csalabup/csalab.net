<?php

namespace junecity\shop\providers;

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
        $this->loadAutoloader(base_path('vendor'));
        
        if (! $this->app->routesAreCached()) {
        require __DIR__.'/../routes/routes.php';
         }


        $this->loadViewsFrom(__DIR__.'/../views', 'junecity');


        $this->publishes([
        __DIR__.'/../public/bower_components' => public_path('/bower_components'),
        ], 'public');

        $this->publishes([
        __DIR__.'/../public/css' => public_path('/css'),
        ], 'public');

        $this->publishes([
        __DIR__.'/../public/js' => public_path('/js'),
        ], 'public');


        view()->composer('junecity::layouts.header', function($view)
        
        {
            $view->with('user_name', \Auth::user()->name)
             ->with('created_at', \Auth::user()->created_at->format('M j, Y'));

        });

        view()->composer('junecity::layouts.sidebar', function($view)
        
        {
           $view->with('user_name', \Auth::user()->name);

           $view->with('user', \Auth::user());

        });


       
      
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
       
        
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
