<?php

namespace App\Http\Controllers\Role;

trait RoleTrait
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function role()
    {
        return response()->json([
            'message' => 'Hello World',
        ]);
    }
}
