<?php

namespace JustBetter\Akeneo\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateAkeneoRequest
{
    public function handle(Request $request, Closure $next)
    {
        $secret = config('akeneo.events.secret');

        $originalSignature = $request->header('X-Akeneo-Request-Signature');
        $timestamp = $request->header('X-Akeneo-Request-Timestamp');

        ray('test');

        // The whole request body.
        $requestBody = $request->getContent();

        // Prepare the event payload.
        $signedPayload = "{$timestamp}.{$requestBody}";

        // Generate a hash signature.
        $generatedSignature = hash_hmac("sha256", $signedPayload, $secret);

        // Compare the original and generated signature.
        if (! hash_equals($originalSignature, $generatedSignature)) {
            return response()->json(
                data: [
                    'message' => 'Unauthorized'
                ],
                status: 401
            );
        }
        return $next($request);
    }
}
