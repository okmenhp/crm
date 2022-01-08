<?php

namespace App\Traits;

trait ApiResponse
{
    protected function success($data = [], $message = "")
    {
        return response([
            'status' => 1,
            'data' => $data,
            'message' => $message,
        ]);
    }

    protected function error($message = "")
    {
        return response()->json([
            'status' => 0,
            'message' => $message,
        ]);
    }

    protected function errorValidate($data = [], $message = "")
    {
        return response()->json([
            'status' => 0,
            'data' => $data,
            'message' => $message,
        ]);
    }

}