<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomLog;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class RoomLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = [];

        $response = Http::get('https://api.thingspeak.com/channels/2963540/feeds.json', [
            'api_key' => 'FK2ILNKY6S79VNXY',
            'results' => 20
        ]);

        if ($response->successful()) {
            $feeds = $response->json()['feeds'];

            foreach ($feeds as $index => $feed) {
                $rfid_id = $feed['field1'];
                $door_status = $feed['field2'];
                $staff_id = $feed['field3'];
                $timestamp = $feed['created_at'];

                $user = User::where('rfid_id', $rfid_id)
                            ->orWhere('staff_id', $staff_id)
                            ->first();

                $room = Room::where('rfid_id', $rfid_id)->first();

                if (!$user) {
                    $user = User::inRandomOrder()->first();
                }

                if (!$room) {
                    $room = Room::inRandomOrder()->first();
                }

                $status = $door_status == '1' ? 'Unlock' : 'Locked';

                // Save each log to the database (avoid duplicates)
                RoomLog::updateOrCreate(
                    [
                        'room_name' => $room ? $room->name : 'Unknown Room',
                        'accessed_by' => $user ? $user->name : 'Unknown User',
                        'timestamp' => Carbon::parse($timestamp)->timezone('Asia/Kuala_Lumpur'),
                    ],
                    [
                        'status' => $status
                    ]
                );

                $logs[] = [
                    'no' => $index + 1,
                    'room_name' => $room ? $room->name : 'Unknown Room',
                    'accessed_by' => $user ? $user->name : 'Unknown User',
                    'status' => $status,
                    'timestamp' => Carbon::parse($timestamp)->timezone('Asia/Kuala_Lumpur')->toDateTimeString(),
                ];
            }
        }

        // Filter options
        $rooms = Room::all();
        $selectedDate = $request->input('date');
        $selectedRoom = $request->input('room_name');

        // Manual filtering of $logs (in-memory) since we use API data
        if ($selectedDate) {
            $logs = array_filter($logs, function ($log) use ($selectedDate) {
                return strpos($log['timestamp'], $selectedDate) === 0;
            });
        }

        if ($selectedRoom) {
            $logs = array_filter($logs, function ($log) use ($selectedRoom) {
                return $log['room_name'] === $selectedRoom;
            });
        }

        return view('logs.index', compact('rooms', 'logs', 'selectedDate', 'selectedRoom'));
    }

    public function exportPdf(Request $request)
{
    $logs = [];

    $selectedRoom = $request->input('room_name');
    $selectedDate = $request->input('date');

    $response = Http::get('https://api.thingspeak.com/channels/2963540/feeds.json', [
        'api_key' => 'FK2ILNKY6S79VNXY',
        'results' => 20
    ]);

    if ($response->successful()) {
        $feeds = $response->json()['feeds'];

        foreach ($feeds as $index => $feed) {
            $rfid_id = $feed['field1'];
            $door_status = $feed['field2'];
            $staff_id = $feed['field3'];
            $timestamp = $feed['created_at'];

            $user = User::where('rfid_id', $rfid_id)
                        ->orWhere('staff_id', $staff_id)
                        ->first();

            $room = Room::where('rfid_id', $rfid_id)->first();

            if (!$user) {
                $user = User::inRandomOrder()->first();
            }

            if (!$room) {
                $room = Room::inRandomOrder()->first();
            }

            $convertedTime = Carbon::parse($timestamp)->timezone('Asia/Kuala_Lumpur');
            $status = $door_status == '1' ? 'Unlock' : 'Locked';

            $log = [
                'no' => $index + 1,
                'room_name' => $room ? $room->name : 'Unknown Room',
                'accessed_by' => $user ? $user->name : 'Unknown User',
                'status' => $status,
                'timestamp' => $convertedTime->toDateTimeString(),
            ];

            // Apply filters
            if ($selectedRoom && $log['room_name'] !== $selectedRoom) {
                continue;
            }

            if ($selectedDate && strpos($log['timestamp'], $selectedDate) !== 0) {
                continue;
            }

            $logs[] = $log;
        }
    }

    $pdf = PDF::loadView('logs.pdf', compact('logs'));
    return $pdf->download('room_logs.pdf');
}


    public function filterLogs(Request $request)
    {
        $selectedRoom = $request->input('room_name');
        $selectedDate = $request->input('date'); // Format: YYYY-MM-DD

        $logs = RoomLog::query();

        if ($selectedRoom) {
            $logs->where('room_name', $selectedRoom);
        }

        if ($selectedDate) {
            $logs->whereDate('timestamp', $selectedDate);
        }

        $logs = $logs->orderBy('timestamp', 'desc')->get();

        $rooms = RoomLog::select('room_name')->distinct()->get();

        return view('logs.index', compact('logs', 'rooms', 'selectedRoom', 'selectedDate'));
    }

}
