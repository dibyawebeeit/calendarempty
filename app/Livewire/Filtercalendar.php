<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Client\App\Models\Client;
use Modules\Event\App\Models\Event;
use Modules\Event\App\Models\Reminder;
use Modules\Event\App\Models\Assign;
use App\Models\User;
use App\Models\State;

use Carbon\Carbon;

class Filtercalendar extends Component
{
    public $clientList = [];
    public $userList = [];

    public $month;
    public $year;
    public $days;
    public $highlightedDates = []; // Now an array of dates
    public $filtermonth, $filteryear;
    public $clientId;
    public $userId;
    public $viewBy;

    public function mount($month = null, $year = null)
    {
        $this->clientList = Client::select('id', 'first_name', 'last_name')->where('status', 1)->orderBy('first_name', 'ASC')->get();
        $this->userList = User::select('id', 'first_name', 'last_name')->where('status', 1)->where('role', 0)->orderBy('first_name', 'ASC')->get();

        $this->month = $month ?? now()->month;
        $this->year = $year ?? now()->year;
        // $this->highlightedDates = [
        //     '2025-04-04',
        //     '2025-04-06',
        // ];

        $eventArray = [];
        $eventQuery = Event::select('id', 'start_date')->get();
        foreach ($eventQuery as $event) {
            $date = Carbon::parse($event['start_date']);
            $formattedDate = $date->format('Y-m-d');
            // Add the event to the eventArray instead of overwriting it
            $eventArray[$formattedDate] = $event['id'];
            // $eventArray = array(
            //     $formattedDate => $event['id']
            // );
        }
        $this->highlightedDates = $eventArray;
        // dd($this->highlightedDates);

        // $this->highlightedDates = [
        //     '2025-04-04' => 1, // Event ID 1 for April 4th
        //     '2025-04-06' => 2, // Event ID 2 for April 6th
        // ];
        $this->generateCalendar();
    }

    public function filterMonthYear()
    {
        $this->dispatch('filtermonthYear', $this->year, $this->month);
    }

    public function  clientFilter()
    {
        $this->dispatch('filterClient', $this->clientId);
    }

    public function userFilter()
    {
        $this->dispatch('filterUser', $this->userId);
    }
    public function viewFilter()
    {
        $this->dispatch('filterView', $this->viewBy);
    }


    public function generateCalendar()
    {
        // Get the first day of the month
        $firstDayOfMonth = Carbon::create($this->year, $this->month, 1);
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        // Get the days of the month
        $daysInMonth = $firstDayOfMonth->daysInMonth;
        $firstDayOfWeek = $firstDayOfMonth->dayOfWeek;

        // Prepare the array of days with empty slots before the first day of the month
        $days = array_fill(0, $firstDayOfWeek, null); // fill empty slots for the previous month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $days[] = $day;
        }

        $this->days = array_chunk($days, 7); // Split the days into weeks (7 days each)
    }

    public function goToNextMonth()
    {
        $this->month++;
        if ($this->month > 12) {
            $this->month = 1;
            $this->year++;
        }
        $this->generateCalendar();
    }

    public function goToPreviousMonth()
    {
        $this->month--;
        if ($this->month < 1) {
            $this->month = 12;
            $this->year--;
        }
        $this->generateCalendar();
    }

    public function render()
    {
        return view('livewire.filtercalendar');
    }
}
