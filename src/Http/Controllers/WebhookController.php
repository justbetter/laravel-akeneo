<?php

namespace JustBetter\Akeneo\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class WebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        if (! $request->json()->has('events')) {
            return response()->json(
                data: [
                    'message' => 'No events provided',
                ],
                status: Response::HTTP_NO_CONTENT
            );
        }

        foreach ($request->json()->get('events') as $event) {
            // TODO: authenticate authenticity request with secret

            $eventAction = (string) Str::of($event['action'])
                ->replace('.', '_')
                ->studly();

            $eventClass = $this->getEventClass($eventAction);

            if (! class_exists($eventClass)) {
                return response()->json(
                    data: [
                        'message' => 'Event not supported',
                    ],
                    status: Response::HTTP_NOT_IMPLEMENTED
                );
            }

            event(new $eventClass($event));
        }

        return response()->json([
            'message' => 'payload handled',
        ]);
    }

    protected function getEventClass(string $eventAction): string
    {
        return '\\JustBetter\\Akeneo\\Events\\'.$eventAction;
    }
}
