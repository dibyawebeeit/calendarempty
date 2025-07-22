<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use Modules\Event\App\Models\Event;
use Modules\Client\App\Models\Client;
use App\Models\User;
use Modules\Event\App\Models\Reminder;
use Modules\Event\App\Models\Assign;

class Calendar extends Component
{
    public $currentMonth;
    public $currentYear;
    public $daysInMonth;
    public $currentDate; // this will be a Carbon date (start of week)
    public $events = []; // Store events here

    public $selectedYear;
    public $selectedMonth;

    public $clientId;
    public $userId;
    public $viewBy;
    public $eventList = [];
    public $isUserAssign = false;

    protected $listeners = [
        'filtermonthYear' => 'handleFilterMonthYear',
        'filterClient' => 'handleFilterClient',
        'filterUser' => 'handleFilterUser',
        'filterView' => 'handleFilterView',
    ];

    public function handleFilterMonthYear($year, $month)
    {
        $this->currentYear = $year;
        $this->currentMonth = $month;

        $this->selectedYear = $year;
        $this->selectedMonth = $month;

        $this->mount();
    }
    public function handleFilterClient($client_id)
    {
        $this->clientId = $client_id;
        $this->mount();
    }

    public function handleFilterUser($user_id)
    {
        $this->userId = $user_id;
        $this->mount();
    }

    public function handleFilterView($view_by)
    {
        $this->viewBy = $view_by;
        $this->mount();
    }

    public function mount()
    {
        if (!$this->selectedYear) {
            // Set the initial month and year to the current date
            $this->currentMonth = now()->month;
            $this->currentYear = now()->year;
        }
        $this->currentDate = Carbon::now()->startOfWeek(); // Sunday
        // $this->loadWeeklyEvents();

        $this->calculateDaysInMonth();
        $this->loadEvents();  // Load events for the month
    }

    public function previousWeek()
    {
        $this->currentDate = $this->currentDate->copy()->subWeek();
        // $this->loadWeeklyEvents();
        $this->loadEvents();
    }

    public function nextWeek()
    {
        $this->currentDate = $this->currentDate->copy()->addWeek();
        // $this->loadWeeklyEvents();
        $this->loadEvents();
    }

    public function calculateDaysInMonth()
    {
        // Get the first day of the month to calculate the day of the week it starts on
        $firstDayOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1);
        // Get the number of days in the current month
        $this->daysInMonth = $firstDayOfMonth->daysInMonth;
    }

    public function loadEvents_bkp()
    {
        $this->events = [];  // Clear the old events
        $eventIds = [];

        if ($this->userId && $this->userId != 0) {
            $assignList = Assign::where('userId', $this->userId)->whereNull('reminderId')->pluck('eventId')->toArray();
            $eventIds = array_merge($eventIds, $assignList);
            $this->isUserAssign = true;
        } else {
            $this->isUserAssign = false;
        }


        $conditions = [];

        if ($this->clientId) {
            $conditions['clientId'] = $this->clientId;
        }

        if ($this->isUserAssign == true) {
            $this->eventList = Event::where($conditions)->whereIn('id', $eventIds)->get();
        } else {
            $this->eventList = Event::where($conditions)->get();
        }

        if (count($this->eventList) > 0) {
            foreach ($this->eventList as $event) {
                $date = Carbon::parse($event['start_date']);
                $formattedDate = $date->format('Y-m-d');
                $formattedTime = $date->format('g:i A');

                $this->events[$formattedDate][] = [
                    'id' => $event['id'],
                    'title' => $event['title'],
                    'time' => $formattedTime
                ];
            }
        } else {
            $this->events = [];
        }







        // dd($this->events);
        // $this->events = [
        //     '2025-04-04' => [
        //         ['id' => 1, 'title' => 'Event 1']
        //     ],
        //     '2025-04-10' => [
        //         ['id' => 2, 'title' => 'Event 2']
        //     ],
        //     '2025-05-11' => [
        //         ['id' => 3, 'title' => 'Event 3']
        //     ],
        // ];
    }

    public function loadEvents()
    {
        if ($this->viewBy == 1) {
            //Month (Printer Friendly)
            $this->events = [];  // Reset
            $eventIds = [];

            if ($this->userId && $this->userId != 0) {
                $assignList = Assign::where('userId', $this->userId)
                    ->whereNull('reminderId')
                    ->pluck('eventId')
                    ->toArray();
                $eventIds = array_merge($eventIds, $assignList);
                $this->isUserAssign = true;
            } else {
                $this->isUserAssign = false;
            }

            $conditions = [];

            if ($this->clientId) {
                $conditions['clientId'] = $this->clientId;
            }

            $query = Event::whereMonth('start_date', $this->currentMonth)
                ->whereYear('start_date', $this->currentYear)
                ->where($conditions);

            if ($this->isUserAssign) {
                $query->whereIn('id', $eventIds);
            }

            $this->eventList = $query->orderBy('start_date')->get();

            foreach ($this->eventList as $event) {
                $start = Carbon::parse($event->start_date);
                $formattedDate = $start->format('Y-m-d');

                //assign user start
                $assignResult = Assign::with('userDetails')->where('eventId', $event->id)->get();
                if (!empty($assignResult)) {
                    foreach ($assignResult as $value) {
                        if ($value->userDetails) {
                            $assignUsersArray[] = $value->userDetails['first_name'] . " " . $value->userDetails['last_name'];
                        }
                    }
                }
                if (!empty($assignUsersArray)) {
                    $eventAssignUsers = implode(', ', $assignUsersArray);
                } else {
                    $eventAssignUsers = "NA";
                }
                //assign user end

                $this->events[$formattedDate][] = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'time' => $start->format('g:i a'),
                    'client' => $event->client ? $event->client->first_name . ' ' . $event->client->last_name : 'N/A',
                    // 'assigned_to' => $event->assignedUser ? $event->assignedUser->first_name.' '.$event->assignedUser->last_name : 'N/A',
                    'assigned_to' => $eventAssignUsers,
                    'end' => Carbon::parse($event->end_date)->format('l, M j, Y, g:i a')
                ];

                $assignUsersArray = [];
            }
        } else if ($this->viewBy == 2) {
            //Week
            $this->events = [];

            $start = $this->currentDate->copy();
            $end = $start->copy()->addDays(6);

            $query = Event::whereDate('start_date', '>=', $start->toDateString())
                ->whereDate('start_date', '<=', $end->toDateString())
                ->orderBy('start_date');

            // Apply filters (userId, clientId) if needed
            if ($this->userId && $this->userId != 0) {
                $assignList = Assign::where('userId', $this->userId)
                    ->whereNull('reminderId')
                    ->pluck('eventId')
                    ->toArray();

                $query->whereIn('id', $assignList);
            }

            if ($this->clientId) {
                $query->where('clientId', $this->clientId);
            }

            $events = $query->get();

            foreach ($events as $event) {
                $dateKey = Carbon::parse($event->start_date)->format('Y-m-d');
                $this->events[$dateKey][] = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'time' => Carbon::parse($event->start_date)->format('g:i a'),
                    'client' => $event->client->name ?? null,
                ];
            }
        } else {
            //Month
            $this->events = [];  // Clear the old events
            $eventIds = [];

            if ($this->userId && $this->userId != 0) {
                $assignList = Assign::where('userId', $this->userId)->whereNull('reminderId')->pluck('eventId')->toArray();
                $eventIds = array_merge($eventIds, $assignList);
                $this->isUserAssign = true;
            } else {
                $this->isUserAssign = false;
            }


            $conditions = [];

            if ($this->clientId) {
                $conditions['clientId'] = $this->clientId;
            }

            if ($this->isUserAssign == true) {
                $this->eventList = Event::where($conditions)->whereIn('id', $eventIds)->get();
            } else {
                $this->eventList = Event::where($conditions)->get();
            }

            if (count($this->eventList) > 0) {
                foreach ($this->eventList as $event) {
                    $date = Carbon::parse($event['start_date']);
                    $formattedDate = $date->format('Y-m-d');
                    $formattedTime = $date->format('g:i A');

                    $this->events[$formattedDate][] = [
                        'id' => $event['id'],
                        'title' => $event['title'],
                        'time' => $formattedTime
                    ];
                }
            } else {
                $this->events = [];
            }
        }
    }

    public function previousMonth()
    {
        // Decrease the month
        if ($this->currentMonth == 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        } else {
            $this->currentMonth--;
        }
        $this->calculateDaysInMonth();
        $this->loadEvents();  // Reload events
    }

    public function nextMonth()
    {
        // Increase the month
        if ($this->currentMonth == 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        } else {
            $this->currentMonth++;
        }
        $this->calculateDaysInMonth();
        $this->loadEvents();  // Reload events
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
