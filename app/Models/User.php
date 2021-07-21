<?php

namespace App\Models;

use App\Traits\Notifiable;
use App\Models\System\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\System\Ability;
use App\Models\System\License;
use App\Models\Account\Session;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use App\Models\MyAccount\Announcement;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The model relationship
     */

    public function announcements()
    {
        if ($this->licenseOnModule('myaccount') !== 'myaccount-pegawai') {
            return $this->hasMany(Announcement::class);
        }
        
        return $this->belongsToMany(Announcement::class, 'users_announcements')->withPivot('read_at');
    }

    public function enabledTwoFactor(): bool
    {
        return $this->two_factor_secret !== null;
    }
    
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function abilities()
    {
        return $this
            ->belongsToMany(Ability::class, 'system_licenses')
            ->withPivot('module_id')
            ->withTimestamps();
    }

    public function attachAbilities(...$abilities)
    {
        foreach ($abilities as $ability) {
            if ($ability = Ability::firstWhere('slug', $ability)) {
                $this->abilities()->syncWithoutDetaching([
                    $ability->id => ['module_id' => $ability->module_id]
                ]);
            }
        }
    }

    public function licenses()
    {
        return $this->hasMany(License::class);
    }

    private function licenseOnModule($slug): string
    {
        $user = Cache::rememberForever($slug . '-ability-' . $this->id, function () use ($slug) {
            return $this->licenses()->with(['module' => function ($query) use ($slug) {
                $query->where('slug', $slug);
            }])->first();
        });

        return $user->ability->slug;
    }

    private function permissions(): array
    {
        return Cache::rememberForever('user_' . $this->id . '_permissions', function () {
            $permissions = [];

            foreach ($this->abilities as $ability) {
                array_push($permissions, $ability->permissions()->pluck('system_permissions.slug'));
            }

            return Arr::collapse($permissions);
        });
    }

    public function hasPermission($permission): bool
    {
        return in_array($permission, $this->permissions());
    }

    public function hasAnyPermission(...$permissions): bool
    {
        $allpermissions = $this->permissions();

        foreach ($permissions as $permission) {
            if (in_array($permission, $allpermissions)) {
                return true;
            }
        }

        return false;
    }

    public function getPermissionOnPage($module)
    {
        $permissions = [];

        $page = Page::firstWhere('slug', $module);

        if ($page) {
            $allpermissions = $this->permissions();

            foreach ($page->permissions()->pluck('slug') as $permission) {
                if (in_array($permission, $allpermissions)) {
                    array_push($permissions, str_replace('-' . $module, '', $permission));
                }
            }
        }

        return $permissions;
    }

    public function getPageIcon($slug)
    {
        return optional(Page::firstWhere('slug', $slug))->icon;
    }

    public function getPageLink($slug): array
    {
        $page = Page::firstWhere('slug', $slug);

        if ($page) {
            return [
                'icon' => $page->icon,
                'text' => $page->name,
                'slug' => $page->slug,
                'path' => $page->path,
                'method' =>  $this->createMethodName($page->slug),
            ];
        }

        return [];
    }

    protected function createMethodName($path):string
    {
        return Str::of($path)->replace('-', '_')->__toString();
    }

    public function getPageTitle($slug)
    {
        return optional(Page::firstWhere('slug', $slug))->name;
    }

    /**
     * scope for data-filter
     *
     * @param Builder $query
     * @param Request $request
     * @return void
     */
    public function scopeFilterOn(Builder $query, Request $request)
    {
        $sortBy = strtolower($request->sortBy) ?: null;
        $sortAz = $request->sortDesc ? 'desc' : 'asc';
        $findBy = strtolower($request->findBy) ?: null;
        $findOn = $request->findOn ?: [];

        $trashed = $request->mode === 'trashed' ?: false;
        $filterOn = $request->filterOn ?: [];
        $filterBy = $request->filterBy ?: [];
        $filterOp = $request->filterOp ?: [];

        $mquery = $query;

        if ($trashed) {
            $mquery = $mquery->onlyTrashed();
        }

        foreach ($findOn as $key => $find) {
            if ($key <= 0) {
                $mquery = $mquery->whereRaw("LOWER({$find}) LIKE ?", ["%{$findBy}%"]);
            } else {
                $mquery = $mquery->orWhereRaw("LOWER({$find}) LIKE ?", ["%{$findBy}%"]);
            }
        }

        foreach ($filterOp as $i => $operation) {
            if ($operation === '*') {
                $mquery = $mquery->whereRaw("{$filterOn[$i]} LIKE ?", ["%{$filterBy[$i]}%"]);
            } else {
                $mquery = $mquery->whereRaw("{$filterOn[$i]} {$operation} ?", ["{$filterBy[$i]}"]);
            }
        }

        if ($sortBy) {
            $mquery = $mquery->orderBy($sortBy, $sortAz);
        } else {
            $mquery = $mquery->orderBy('name', $sortAz);
        }

        return $mquery;
    }
}
