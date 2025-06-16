<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomLog;

class RoomLogSeeder extends Seeder
{
    public function run(): void
    {
        RoomLog::create([
            'room_name' => 'Meeting Room',
            'accessed_by' => 'staff@example.com',
            'status' => 'Unlocked',
            'accessed_at' => now()->subMinutes(5),
        ]);
    }
}
