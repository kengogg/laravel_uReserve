<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventService
{
    public static function checkEventDuplication($event_date, $start_time, $end_time)
    {
        return DB::table('events')
        ->whereDate('start_date', $event_date)
        ->whereTime('end_date', '>', $start_time)
        ->whereTime('start_date', '<', $end_time)
        ->exists();

    }


    public static function joinDateAndTime($date, $time)
    {
        $join = $date . " " . $time;
        return Carbon::createFromFormat(
            'Y-m-d H:i', $join);
    }
}
