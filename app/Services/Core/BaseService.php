<?php

namespace App\Services\Core;

use Illuminate\Http\Request;

abstract class BaseService
{
    protected function redirectWithError(string $message)
    {
        return redirect()
                ->back()
                ->withErrors(['error' => $message]);
    }

    protected function redirectWith(string $message, string $type = 'success')
    {
        return redirect()
                ->back()
                ->with([$type => $message]);
    }

    protected function successRedirectBack(string $message = 'Saqlandi')
    {
        return redirect()
                    ->back()
                    ->with('success', $message);
    }

    protected function getCleanedData(Request $request)
    {
        $data = $request->validated();

        return cleanNullArray($data);
    }

    protected function jsonSuccess(array $data = [])
    {
        $response = [
            'success' => true,
        ];

        if (count($data) > 0) {
            $response['data'] = $data;
        }

        return response()->json($response);
    }

    public function jsonError(string $message = null)
    {
        $response = [
            'success' => false,
        ];

        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response);
    }
}
