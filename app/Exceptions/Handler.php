<?php

namespace App\Exceptions;

use Throwable;
use Hybridly\Contracts\HybridResponse;
use Hybridly\Concerns\HandlesHybridExceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    // use HandlesHybridExceptions;

    protected $skipEnvironments = ['test'];

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function renderHybridResponse(Response $response, Request $request, \Throwable $e): HybridResponse
    {
        return hybridly('error', [
            'status' => $response->getStatusCode()
        ]);
    }
}
