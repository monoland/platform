<?php

namespace App\Http\Resources\Account;

use App\Models\User;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Laravel\Sanctum\NewAccessToken;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
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
            'token' => $this->fetchUserToken($request),

            'profile' => [
                'identifier' => $this->id,
                'avatar' => $this->profile_avatar_path,
                'name' => $this->name,
                'email' => $this->email,
                'theme' => $this->theme
            ],

            'modules' => $this->fetchUserModules(),
        ];
    }

    protected function fetchUserToken($request): string|null
    {
        $userAgent = $request->userAgent();
        
        $agent = $this->createAgent($userAgent);

        if ($agent->isDesktop()) {
            return null;
        }
        
        $request->user()->tokens()->where('name', $userAgent)->delete();
        $request->user()->sessions()->where('user_agent', $userAgent)->delete();

        return $this->createToken($request->user(), $userAgent, $request->ip())->plainTextToken;
    }

    protected function createToken(User $user, string $name, string $ip_address, array $abilities = ['*'])
    {
        $token = new PersonalAccessToken();
        $token->name = $name;
        $token->token = hash('sha256', $plainTextToken = Str::random(40));
        $token->ip_address = $ip_address;
        $token->abilities = $abilities;
        $token = $user->tokens()->save($token);

        return new NewAccessToken($token, $token->getKey().'|'.$plainTextToken);
    }

    protected function createAgent($user_agent)
    {
        return tap(new Agent, function ($agent) use ($user_agent) {
            $agent->setUserAgent($user_agent);
        });
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    protected function fetchUserModules(): array
    {
        return $this->abilities->reduce(function ($carry, $ability) {
            array_push($carry, [
                'name' => $ability->module->name,
                'slug' => $ability->module->slug,
                'path' => $ability->module->path,
                'icon' => $ability->module->icon,
                'color' => $ability->module->color,
                'show' => $ability->module->visibility,
                'pages' => $this->mapPages($ability),
            ]);

            return $carry;
        }, []);
    }

    protected function mapPages($ability): array
    {
        return $ability->pages->reduce(function ($carry, $page) use ($ability) {
            array_push($carry, [
                'name' => $page->name,
                'slug' => $page->slug,
                'icon' => $page->icon,
                'prefix' => $page->prefix,
                'path' => $page->path,
                'side' => $page->side,
                'dock' => $page->dock,
                'permissions' => $this->mapPermissions($ability, $page)
            ]);

            return $carry;
        }, []);
    }

    protected function mapPermissions($ability, $page): array
    {
        return $ability
            ->permissions()
            ->where('system_abilities_permissions.page_id', $page->id)
            ->pluck('system_permissions.slug')
            ->toArray();
    }
}
