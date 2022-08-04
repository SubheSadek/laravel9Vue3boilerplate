<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Role\RoleRequest;
use App\Http\Controllers\Role\RoleTrait;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use RoleTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? '';
        $roles = Role::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);
        return response()->json($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());
        return response()->json(['role' => $role, 'message' => 'Role Created Successfully 🎉😊!'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        if ($role->update($request->validated())) {
            return response()->json(['role', $role, 'message' => 'Role Updated Successfully 🎉😊!'], 200);
        }
        return response()->json(['message' => 'Role Update Failed 😢!'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return response()->json(['message' => 'Role Deleted Successfully 🎉😊!'], 200);
        }
        return response()->json(['message' => 'Role Delete Failed 😢!'], 400);
    }
}
