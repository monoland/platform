<?php

namespace App\Http\Controllers\MyAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MyAccount\DashboardResource;

class MyAccountBaseController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return new DashboardResource($request);
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
