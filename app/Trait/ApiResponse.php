<?php

namespace App\Trait ;

trait ApiResponse

{

    public function success($data = null, $code = 'همچی اوکیه', $message = 'با موفقیت انجام شد'): \Illuminate\Http\JsonResponse

    {
        return response()->json([
            'data' => $data,
            'message' => $message
        ], $code);
    }

    public function error($data = null, $code = 'مشکلی داریم', $message = 'Error'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message
        ], $code);
    }

}
