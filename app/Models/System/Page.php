<?php

namespace App\Models\System;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\System\PageResource;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use NodeTrait, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'system_pages';

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
            ->with(['permissions', 'permissions.module', 'permissions.page', 'module'])
            ->withDepth()
            ->withTrashed()
            ->where($field ?? $this->getRouteKeyName(), $value)
            ->first();
    }

    /**
     * The model relationsship
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class)->orderBy('slug');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * scope for model-combo
     *
     * @param Builder $query
     * @return void
     */
    public function scopeFetchCombo(Builder $query)
    {
        return $query
            ->select('name AS text', 'id AS value')
            ->get();
    }

    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return array
     */
    public static function createLink($slug): array
    {
        $page = (new static)->firstWhere('slug', $slug);

        if ($page) {
            return [
                'icon' => $page->icon,
                'text' => Str::of($page->name)->replace(' ', '<span class="transparent--text">_</span>'), //$page->parent ? $page->parent->name . '/' . $page->name : $page->name
                'slug' => $page->slug,
                'path' => $page->path
            ];
        }

        return null;
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

    /**
     * The model store method
     *
     * @param Request $request
     * @return void
     */
    public static function storeRecord(Request $request, Module $parent)
    {
        DB::beginTransaction();

        try {
            $model = new static;
            $model->name = $request->name;
            $model->slug = Str::slug($parent->slug . '-' . $request->name);
            $model->icon = $request->icon;
            $model->prefix = $request->prefix;
            $model->path = $request->path;
            $model->describe = $request->describe;
            $model->side = $request->side;
            $model->dock = $request->dock;
            $model->parent_id = $request->parent_id;
            
            $parent->pages()->save($model);

            DB::commit();

            return new PageResource($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * The model update method
     *
     * @param Request $request
     * @param [type] $model
     * @return void
     */
    public static function updateRecord(Request $request, Page $model, Module $parent)
    {
        DB::beginTransaction();

        try {
            $model->name = $request->name;
            $model->slug = Str::slug($parent->slug . '-' . $request->name);
            $model->icon = $request->icon;
            $model->prefix = $request->prefix;
            $model->path = $request->path;
            $model->describe = $request->describe;
            $model->side = $request->side;
            $model->dock = $request->dock;
            $model->parent_id = $request->parent_id;
            $model->save();

            DB::commit();

            return new PageResource($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * The model delete method
     *
     * @param [type] $model
     * @return void
     */
    public static function deleteRecord($model)
    {
        DB::beginTransaction();

        try {
            $model->delete();

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * The model restore method
     *
     * @param [type] $model
     * @return void
     */
    public static function restoreRecord($model)
    {
        DB::beginTransaction();

        try {
            $model->restore();

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * The model destroy method
     *
     * @param [type] $model
     * @return void
     */
    public static function destroyRecord($model)
    {
        DB::beginTransaction();

        try {
            $model->forceDelete();

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
