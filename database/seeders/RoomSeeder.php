<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::insert([
            [
                'name' => 'Seminar Room',
                'slug' => 'seminar-room',
                'status' => 'Locked',
                'description' => 'Used for seminars and workshops.',
            ],
            [
                'name' => 'Meeting Room',
                'slug' => 'meeting-room',
                'status' => 'Unlocked',
                'description' => 'For staff meetings and discussions.',
            ],
            [
                'name' => 'Lab',
                'slug' => 'lab',
                'status' => 'Locked',
                'description' => 'Technical lab with equipment.',
            ],
            [
                'name' => 'Office',
                'slug' => 'office',
                'status' => 'Unlocked',
                'description' => 'Admin and staff offices.',
            ],
        ]);
    }
    
}
