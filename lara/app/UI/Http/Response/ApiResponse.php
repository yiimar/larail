<?php

declare(strict_types=1);

namespace App\UI\Http\Response;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiResponse
{
    private const WRONG_MESSAGE = 'Something went wrong! Process not completed';

    public static function rollback($e, $message = self::WRONG_MESSAGE): JsonResponse
    {
        DB::rollBack();
        self::throw($e, $message);
    }

    public static function throw($e, $message = self::WRONG_MESSAGE): void
    {
        Log::info($e);
        throw new HttpResponseException(response()->json(["message"=> $message], 500));
    }

    public static function sendResponse($result, $message, $code = 200): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result
        ];
        if (!empty($message)) {
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}
