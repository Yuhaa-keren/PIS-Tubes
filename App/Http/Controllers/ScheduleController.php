<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('user1_id', Auth::id())
            ->orWhere('user2_id', Auth::id())
            ->with(['user1', 'user2'])
            ->orderBy('scheduled_at', 'desc')
            ->paginate(10);

        $users = User::where('id', '!=', Auth::id())->get();

        return view('schedule', compact('schedules', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user2_id' => 'required|exists:users,id|different:user1_id',
            'scheduled_at' => 'required|date|after:now',
            'method' => 'required|in:online,offline',
            'notes' => 'nullable|string',
        ]);

        Schedule::create([
            'user1_id' => Auth::id(),
            'user2_id' => $request->user2_id,
            'scheduled_at' => $request->scheduled_at,
            'method' => $request->method,
            'notes' => $request->notes,
        ]);

        return redirect()->route('schedule')->with('success', 'Schedule created successfully!');
    }

    public function edit(Schedule $schedule)
    {
        if ($schedule->user_id !== Auth::id()) {
            abort(403, 'Anda tidak diizinkan untuk mengedit jadwal ini.');
        }

        $users = User::orderBy('name')->get(); 

        return view('schedule.edit', compact('schedule', 'users'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        if ($schedule->user1_id !== Auth::id() && $schedule->user2_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'scheduled_at' => 'required|date|after:now',
            'method' => 'required|in:online,offline',
            'notes' => 'nullable|string',
            'status' => 'required|in:upcoming,completed,cancelled',
        ]);

        $schedule->update([
            'scheduled_at' => $request->scheduled_at,
            'method' => $request->method,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        return redirect()->route('schedule')->with('success', 'Schedule updated successfully!');
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->user1_id !== Auth::id() && $schedule->user2_id !== Auth::id()) {
            abort(403);
        }

        $schedule->delete();

        return redirect()->route('schedule')->with('success', 'Schedule deleted successfully!');
    }
}