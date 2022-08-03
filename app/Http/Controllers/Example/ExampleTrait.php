<?php

namespace App\Http\Controllers\Example;

trait ExampleTrait
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function example()
    {
        return response()->json([
            'message' => 'Hello World',
        ]);
    }
}
