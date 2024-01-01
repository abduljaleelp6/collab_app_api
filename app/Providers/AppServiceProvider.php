<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Business;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		$this->app['auth']->viaRequest('api', function ($request) {
            $header = $request->header('noBody');
            if ($header && $header == 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC') 
            {
                return new Business();
            } else {
                return null;
            }
        });
    }
}
