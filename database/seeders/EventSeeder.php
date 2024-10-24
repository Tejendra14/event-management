<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $numEvents = 5;
        $numAttendeesPerEvent = 3;

        $events = [];

        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        for ($i = 1; $i <= $numEvents; $i++) {
            $events[] = [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(2),
                'date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'location' => $faker->city,
                'category_id' => $faker->randomElement($categoryIds),
            ];
        }

        DB::table('events')->insert($events);

        $eventIds = DB::table('events')
            ->orderBy('id', 'desc')
            ->limit($numEvents)
            ->pluck('id');

        $attendees = [];

        foreach ($eventIds as $eventId) {
            for ($j = 1; $j <= $numAttendeesPerEvent; $j++) {
                $attendees[] = [
                    'name' => $faker->name,
                    'email' => $faker->safeEmail,
                    'event_id' => $eventId,
                ];
            }
        }

        DB::table('attendees')->insert($attendees);
    }
}