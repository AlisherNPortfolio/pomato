<?php

if (!function_exists('is_prod')) {
    /**
     * Checks if application in production mode.
     *
     * @return bool
     */
    function is_prod()
    {
        return app()->environment() !== 'local';
    }
}

if (!function_exists('success_response')) {
    /**
     * Json data wrapper for a success response to clients. Aimed for API applications. Returns Illuminate\Http\JsonResponse data wrapped with some meta data.
     *
     * @param [type] $data
     * @param int    $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function success_response($data, $code = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $code);
    }
}

if (!function_exists('error_response')) {
    /**
     * Json data wrapper for a error response to clients. Aimed for API applications. Returns Illuminate\Http\JsonResponse data wrapped with some meta data.
     *
     * @param string $message
     * @param int    $code
     * @param [type] $details
     *
     * @return Illuminate\Http\JsonResponse
     */
    function error_response($message = '', $code = 0, $details = null)
    {
        $response = [
            'success' => false,
            'code' => $code,
            'message' => $message,
        ];

        if (!is_prod()) {
            $response['details'] = $details;
        }

        return response()->json($response);
    }
}

if (!function_exists('checked_asset')) {
    function checked_asset(string $src)
    {
        $secure = \Illuminate\Support\Facades\App::environment('local') ? false : true;

        return asset($src, $secure);
    }
}
