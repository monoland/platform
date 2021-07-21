<?php

namespace App\Http\Resources\MyAccount;

use Jenssegers\Agent\Agent;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'current_password' => null,
            'password' => null,
            'password_confirmation' => null,
            'devices' => $this->fetchUserDevices($request),
            'sessions' => $this->fetchUserSessions($request),
            'two_factor_enable' => $this->enabledTwoFactor(),
            'two_factor_qrcode' => $this->enabledTwoFactor() ? $this->twoFactorQrCodeSvg() : null,
            'two_factor_recovery' => $this->enabledTwoFactor() ? json_decode(decrypt($this->two_factor_recovery_codes)) : [],
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     */
    protected function fetchUserDevices($request)
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
     * @param [type] $request
     */
    protected function fetchUserSessions($request)
    {
        return collect(
            DB::table('sessions')
                    ->where('user_id', $this->getAuthIdentifier())
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
     * @param [type] $user_agent
     */
    protected function createAgent($user_agent)
    {
        return tap(new Agent, function ($agent) use ($user_agent) {
            $agent->setUserAgent($user_agent);
        });
    }
}
