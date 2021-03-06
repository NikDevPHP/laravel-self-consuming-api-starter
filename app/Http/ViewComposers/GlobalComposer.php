<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class GlobalComposer
{

    /**
     * Create a new Global View Composer.
     */
    public function __construct()
    {
        //
    }

    /**
     * Bind data to every view.
     *
     * @param  View $view
     */
    public function compose(View $view)
    {
        $dispatcher = app('Dingo\Api\Dispatcher');
        $dingo_v1 = app('Dingo\Api\Routing\UrlGenerator')->version('v1');
        $main_route = 'http://' . env('APP_MAIN');
        $mobile_route = 'http://mobile' . env('SESSION_DOMAIN');
        $admin_route = 'http://admin' . env('SESSION_DOMAIN');

        $view->with([
            'dispatcher'   => $dispatcher,
            'dingo_v1'     => $dingo_v1,
            'main_route'   => $main_route,
            'mobile_route' => $mobile_route,
            'admin_route'  => $admin_route
        ]);
    }

}