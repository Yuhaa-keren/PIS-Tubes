<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller; 
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class ScheduleApiController extends Controller
{
    public function index()
    {
        try {
            $schedules = Schedule::where('user1_id', Auth::id())
                                 ->orWhere('user2_id', Auth::id())
                                 ->with(['user1', 'user2']) 
                                 ->orderBy('scheduled_at', 'desc')
                                 ->paginate(10);

            return response()->json([
                'data' => $schedules->items(), 
                'meta' => [ 
                    'current_page' => $schedules->currentPage(),
                    'last_page' => $schedules->lastPage(),
                    'per_page' => $schedules->perPage(),
                    'total' => $schedules->total(),
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error in ScheduleApiController@index: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['message' => 'Failed to retrieve schedules.', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'user2_id' => 'required|exists:users,id|different:user1_id', 
            'scheduled_at' => 'required|date|after:now',
            'method' => 'required|in:online,offline',
            'notes' => 'nullable|string',
        ]);

        try {
            $schedule = Schedule::create([
                'user1_id' => Auth::id(), 
                'user2_id' => $request->user2_id,
                'scheduled_at' => $request->scheduled_at,
                'method' => $request->method,
                'notes' => $request->notes,
                'status' => 'upcoming', 
            ]);

            return response()->json(['message' => 'Schedule created successfully!', 'schedule' => $schedule], 201);
        } catch (\Exception $e) {
            Log::error('Error in ScheduleApiController@store: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['message' => 'Failed to create schedule.', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Schedule $schedule)
    {
        if ($schedule->user1_id !== Auth::id() && $schedule->user2_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized to view this schedule.'], 403);
        }

        try {
            $schedule->load(['user1', 'user2']);
            return response()->json($schedule);
        } catch (\Exception $e) {
            Log::error('Error in ScheduleApiController@show: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['message' => 'Failed to retrieve schedule details.', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Schedule $schedule)
    {
        if ($schedule->user1_id !== Auth::id() && $schedule->user2_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized to update this schedule.'], 403);
        }

        $request->validate([
            'scheduled_at' => 'required|date|after:now',
            'method' => 'required|in:online,offline',
            'notes' => 'nullable|string',
            'status' => 'required|in:upcoming,completed,cancelled',
        ]);

        try {
            $schedule->update([
                'scheduled_at' => $request->scheduled_at,
                'method' => $request->method,
                'notes' => $request->notes,
                'status' => $request->status,
            ]);

            return response()->json(['message' => 'Schedule updated successfully!', 'schedule' => $schedule]);
        } catch (\Exception $e) {
            Log::error('Error in ScheduleApiController@update: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['message' => 'Failed to update schedule.', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->user1_id !== Auth::id() && $schedule->user2_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized to delete this schedule.'], 403);
        }

        try {
            $schedule->delete();
            return response()->json(['message' => 'Schedule deleted successfully!'], 204); 
        } catch (\Exception $e) {
            Log::error('Error in ScheduleApiController@destroy: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['message' => 'Failed to delete schedule.', 'error' => $e->getMessage()], 500);
        }
    }
}