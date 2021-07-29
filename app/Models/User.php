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
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes, TwoFactorAuthenticatable;

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
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this
            ->with(['licenses', 'licenses.ability', 'licenses.module'])
            ->withTrashed()
            ->where($field ?? $this->getRouteKeyName(), $value)
            ->first();
    }

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

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return string
     */
    private function licenseOnModule($slug): string
    {
        $user = Cache::rememberForever($slug . '-ability-' . $this->id, function () use ($slug) {
            return $this->licenses()->with(['module' => function ($query) use ($slug) {
                $query->where('slug', $slug);
            }])->first();
        });

        return optional($user->ability)->slug;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
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

    /**
     * Undocumented function
     *
     * @param [type] $permission
     * @return boolean
     */
    public function hasPermission($permission): bool
    {
        return in_array($permission, $this->permissions());
    }

    /**
     * Undocumented function
     *
     * @param [type] ...$permissions
     * @return boolean
     */
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
    
    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return array
     */
    public function getPagePermission($slug): array
    {
        $permissions = [];

        $page = Cache::rememberForever('page-' . $slug, function () use ($slug) {
            return Page::firstWhere('slug', $slug);
        });

        if ($page) {
            $allpermissions = $this->permissions();

            foreach ($page->permissions()->pluck('slug') as $permission) {
                if (in_array($permission, $allpermissions)) {
                    array_push($permissions, str_replace('-' . $slug, '', $permission));
                }
            }
        }

        return $permissions;
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return string
     */
    public function getPageIcon($slug): string | null
    {
        $page = Cache::rememberForever('page-' . $slug, function () use ($slug) {
            return Page::firstWhere('slug', $slug);
        });

        return optional($page)->icon;
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return array
     */
    public function getPageLink($slug): array
    {
        $page = Cache::rememberForever('page-' . $slug, function () use ($slug) {
            return Page::firstWhere('slug', $slug);
        });

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

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return boolean
     */
    public function getPageHasParent($slug): bool
    {
        $page = Cache::rememberForever('page-' . $slug, function () use ($slug) {
            return Page::firstWhere('slug', $slug);
        });

        return optional($page)->parent_id === null;
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return string
     */
    public function getPageParentPath($slug): string | null
    {
        $page = Cache::rememberForever('page-' . $slug, function () use ($slug) {
            return Page::firstWhere('slug', $slug);
        });

        $parent = $page ? optional($page->parent)->slug : null;

        return $parent;
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return string
     */
    public function getPageTitle($slug): string | null
    {
        $page = Cache::rememberForever('page-' . $slug, function () use ($slug) {
            return Page::firstWhere('slug', $slug);
        });

        $parent = $page ? optional($page->parent)->name : null;

        return $parent ? $parent . '-' . optional($page)->name : optional($page)->name;
    }

    /**
     * Undocumented function
     *
     * @param [type] $path
     * @return string
     */
    protected function createMethodName($path):string
    {
        return Str::of($path)->replace('-', '_')->__toString();
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
