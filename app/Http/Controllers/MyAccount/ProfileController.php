<?php

namespace App\Http\Controllers\MyAccount;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Carbon;
use App\Models\MyAccount\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\MyAccount\ProfileResource;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Profile::class);

        return new ProfileResource($request->user());
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function userSessions(Request $request)
    {
        return collect(
            $request->user()->sessions()
                    ->where('user_id', $request->user()->getAuthIdentifier())
                    ->orderBy('last_activity', 'desc')
                    ->get()
        )->reduce(function ($results, $session) use ($request) {
            $agent = $this->createAgent($session->user_agent);

            if (! $agent->isDesktop()) {
                return $results;
            }

            array_push($results, (object) [
                'agent' => [
                    'is_desktop' => true,
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === $request->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ]);

            return $results;
        }, []);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function userTokens(Request $request)
    {
        return collect(
            $request->user()
                    ->tokens()
                    ->orderBy('last_used_at', 'desc')
                    ->get()
        )->map(function ($device) use ($request) {
            $agent = $this->createAgent($device->name);

            return (object) [
                'agent' => [
                    'is_desktop' => false,
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $device->ip_address,
                'is_current_device' => $device->id === optional(Sanctum::$personalAccessTokenModel::findToken($request->bearerToken()))->id,
                'last_active' => Carbon::createFromTimestamp($device->last_used_at)->diffForHumans(),
            ];
        });
    }

    /**
     * Undocumented function
     *
     * @param [type] $user_agent
     * @return Agent
     */
    protected function createAgent($user_agent): Agent
    {
        return tap(new Agent, function ($agent) use ($user_agent) {
            $agent->setUserAgent($user_agent);
        });
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param StatefulGuard $guard
     * @return JsonResponse
     */
    public function destroyOtherSessions(Request $request, StatefulGuard $guard): JsonResponse
    {
        if (! Hash::check($request->password, $request->user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ])->errorBag('logoutOtherBrowserSessions');
        }

        $guard->logoutOtherDevices($request->password);

        $request->user()->sessions()
            ->where('user_id', $request->user()->getAuthIdentifier())
            ->where('id', '!=', $request->session()->getId())
            ->delete();

        return response()->json([], 200);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroyOtherTokens(Request $request): JsonResponse
    {
        if (! Hash::check($request->password, $request->user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ])->errorBag('logoutOtherBrowserTokens');
        }

        $request->user()->tokens()
            ->where('id', '!=', optional(Sanctum::$personalAccessTokenModel::findToken($request->bearerToken()))->id)
            ->delete();

        return response()->json([], 200);
    }
}
