<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Models\System\Setting;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account\AppsResource;
use App\Http\Resources\Account\UserDataResource;

class AccountBaseController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('monoland');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function information(Request $request)
    {
        return new AppsResource(Setting::firstWhere('slug', 'product'));
    }

    /**
     * Undocumented function
     *
     * @param [type] $name
     * @return void
     */
    public function asset($name)
    {
        $path = public_path('images' . DIRECTORY_SEPARATOR . $name . '.png');

        return response()->file($path);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function fetchUserData(Request $request)
    {
        return new UserDataResource(
            $request->user()->load('abilities', 'abilities.module', 'abilities.pages', 'abilities.permissions')
        );
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function fetchPingData(Request $request)
    {
        return response()->json([], 200);
    }
}
