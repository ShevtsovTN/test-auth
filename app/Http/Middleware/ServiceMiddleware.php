<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ServiceMiddleware
{
    public const SERVICE_ID_HEADER = "x-service-id";

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validator = Validator::make(
            [static::SERVICE_ID_HEADER => $request->header(static::SERVICE_ID_HEADER)],
            [static::SERVICE_ID_HEADER => ['required', 'uuid', 'exists:services,id']]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid service'
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        /** @var User $user */
        $user = auth()->user();

        $serviceId = $request->header(static::SERVICE_ID_HEADER);

        if (
            $user
            && $user->services()
                ->where([
                    'id' => $serviceId,
                    'active' => true
                ])
                ->exists()
        ) {
            return response()->json([
                'message' => 'Forbidden'
            ])->setStatusCode(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
