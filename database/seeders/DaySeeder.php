<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Day;
use App\Models\Time;
class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Start from today's date
        $startDate = Carbon::now();

        // Generate data for the next 2 years
        for ($i = 0; $i < 730; $i++) { // 365 days * 2 years = 730 days
            // Insert a record into the 'days' table
            $day = Day::updateOrCreate([
                'date' => $startDate->toDateString(),
            ]);

            // Generate time slots from 8 AM to 8 PM
            $startTime = Carbon::createFromTime(8, 0, 0);
            $endTime = Carbon::createFromTime(20, 0, 0);

            while ($startTime <= $endTime) {
                // Insert a record into the 'times' table for each time slot
                Time::updateOrCreate([
                    'time' => $startTime->toTimeString(),
                    'day_id' => $day->id,
                ]);

                // Increment time by 15 minutes
                $startTime->addMinutes(15);
            }

            // Move to the next day
            $startDate->addDay();
        }
    }
}
