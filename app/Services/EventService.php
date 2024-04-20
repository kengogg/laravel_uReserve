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
            'Y-m-d H:i',
            $join

        );
    }

    public static function getWeekEvents($startDate, $endDate)
    {
        $reservedPeople = DB::table('reservations')
            ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
            ->groupBy('event_id');

        return DB::table('events')
            ->leftJoinSub($reservedPeople, 'reservedPeople', function ($join) {
                $join->on('events.id', '=', 'reservedPeople.event_id');
            })
            ->whereBetween('start_date', [$startDate, $endDate])
            ->orderBy('start_date', 'asc')
            ->get();
        // dd($dd);
    }

    // public static function getWeekEvents($startDate, $endDate)
    // {
    //     $reservedPeople = DB::table('reservations')
    //     ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
    //     ->whereNull('canceled_date')
    //     ->groupBy('event_id');
    //     // dd($reservedPeople);

    //     $dd = DB::table('events')
    //     ->leftjoinSub($reservedPeople, 'reservedPeople',function($join){
    //         $join->on('events.id', '=', 'reservedPeople.event_id');
    //     })
    //     ->whereBetween('events.start_date',[$startDate,$endDate])
    //     ->orderBy('start_date', 'desc')
    //     ->get();

    //     dd($dd);

    //     return $dd;


    // }
}
