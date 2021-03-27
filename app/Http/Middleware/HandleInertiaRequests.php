<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';
    public $count = 0;
    public $messages = 0;

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        if(auth()->id())
        {
            if($request->user()->unreadNotifications()->count())
            {
                $this->count = $request->user()->unreadNotifications()->count();
            }
            else{
                $this->count = 0;
            }

            if($request->user()->messages())
            {
                $this->messages = auth()->user()->messages()->where('read_at', null)->count();
            }
            else{
                $this->messages = 0;
            }
        }
        return array_merge(parent::share($request), [
            'notif' => $this->count,
            'mess' => $this->messages,
        ]);
    }
}
