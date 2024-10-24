<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Events fetched successfully',
            'status_code' => Response::HTTP_OK,
            'data' => $events,
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        $event = Event::with(['category', 'attendees'])->find($id);

        if (!$event) {
            return response()->json([
                'status' => 'error',
                'message' => 'Event not found',
                'status_code' => Response::HTTP_NOT_FOUND,
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Event details fetched successfully',
            'status_code' => Response::HTTP_OK,
            'data' => $event,
        ], Response::HTTP_OK);
    }
}
