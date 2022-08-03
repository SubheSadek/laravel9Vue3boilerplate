<?php

namespace App\Http\Controllers\Auth;

trait AuthTrait
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth()
    {
        return response()->json([
            'message' => 'Hello World',
        ]);
    }
}
