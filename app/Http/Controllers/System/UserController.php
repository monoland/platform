<?php

namespace App\Http\Controllers\System;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\System\UserCollection;
use App\Http\Resources\System\UserShowResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', User::class);

        return new UserCollection(
            User::filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $this->validate($request, []);

        return User::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('show', $user);

        return new UserShowResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $this->validate($request, []);

        return User::updateRecord($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        return User::deleteRecord($user);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\User  $user
     * @return \Illuminate\Http\Response
     */
    public function restore(User $user)
    {
        $this->authorize('restore', $user);

        return User::restoreRecord($user);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\User $user
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(User $user)
    {
        $this->authorize('destroy', $user);

        return User::destroyRecord($user);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', User::class);

        //
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $this->authorize('export', User::class);

        //
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        $this->authorize('report', User::class);

        //
    }
}
