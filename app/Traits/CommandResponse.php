<?php

namespace App\Traits;

trait CommandResponse
{
    public function success($message): array
    {
        return [
            'error' => 0,
            'message' => $message
        ];
    }

    public function error($message): array
    {
        return [
            'error' => 1,
            'message' => $message
        ];
    }
}
