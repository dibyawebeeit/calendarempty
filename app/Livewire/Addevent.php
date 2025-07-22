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

class Addevent extends Component
{
    public $clientList = [];
    public $userList = [];
    public $newClientEntry = false;
    public $stateList;
    public $first_name, $last_name, $address, $city, $stateId, $zipcode, $attorney_rate=0, $legal_secretary_rate=0, $legal_assistant_rate=0, $initial_balance=0, $notes;

    public $start_date, $end_date, $title, $description, $importance, $clientId, $assignedTo = [];
    public $eventId, $daysPrior = [], $reminder_title = [], $reminder_details = [], $reminderAssignedTo = [];
    public $reminderId, $userId;

    public $modalVisible = false;

    public function mount()
    {
        // Fetch your client list
        $this->clientList = Client::select('id', 'first_name', 'last_name')->where('status', 1)->orderBy('first_name', 'ASC')->get();
        $this->userList = User::select('id', 'first_name', 'last_name')->where('status', 1)->where('role',0)->orderBy('first_name', 'ASC')->get();
        $this->stateList = State::select('id', 'title')->where('status', 1)->get();
    }

    public function AddClient()
    {
        $this->newClientEntry = !$this->newClientEntry;
    }

    public function openModal()
    {
        $this->modalVisible = true;
    }

    public function closeModal()
    {
        $this->modalVisible = false;
    }

    public function cancelClient()
    {
        $this->resetClientFilters();
    }

    public function submitClient()
    {
        $this->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'stateId' => 'required|max:11',
            'zipcode' => 'required|max:5',
            'attorney_rate' => 'nullable|numeric|decimal:0,2',
            'legal_secretary_rate' => 'nullable|numeric|decimal:0,2',
            'legal_assistant_rate' => 'nullable|numeric|decimal:0,2',
            'initial_balance' => 'nullable|numeric|decimal:0,2',
        ]);

        $data = array(
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'city' => $this->city,
            'stateId' => $this->stateId,
            'zipcode' => $this->zipcode,
            'attorney_rate' => $this->attorney_rate,
            'legal_secretary_rate' => $this->legal_secretary_rate,
            'legal_assistant_rate' => $this->legal_assistant_rate,
            'initial_balance' => $this->initial_balance,
            'notes' => $this->notes,
        );

        $result = Client::create($data);
        if ($result) {
            $this->mount();
            $this->resetClientFilters();
            session()->flash('success', 'Client added successfully.');
            $this->openModal();
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function resetClientFilters()
    {
        $this->reset(['first_name', 'last_name', 'address', 'city', 'stateId', 'zipcode', 'attorney_rate', 'legal_secretary_rate', 'legal_assistant_rate', 'initial_balance', 'notes']);
    }

    public function submitEvent()
    {
        // $newData = array(
        //     'daysPrior' => $this->daysPrior,
        //     'reminder_title' => $this->reminder_title,
        //     'reminder_details' => $this->reminder_details,
        //     'reminderAssignedTo' => $this->reminderAssignedTo,
        // );
        $new_reminder_title = $this->reminder_title;
        $new_reminder_details = $this->reminder_details;
        $new_reminderAssignedTo = $this->reminderAssignedTo;

        // dd($new_reminder_title[0]);

        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'title' => 'required|max:255',
        ]);

        $data = array(
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'title' => $this->title,
            'description' => $this->description,
            'importance' => $this->importance,
            'clientId' => $this->clientId
        );



        $result = Event::create($data);
        if ($result) {
            $this->eventId = $result->id;

            // client assign 
            if (!empty($this->assignedTo)) {
                foreach ($this->assignedTo as $user) {
                    $eventAssignData = array(
                        'eventId' => $this->eventId,
                        'userId' => $user
                    );
                    Assign::create($eventAssignData);
                }
            }

            //reminder assign
            if (!empty($this->daysPrior)) {
                foreach ($this->daysPrior as $key => $day) {
                    $date = Carbon::parse($this->start_date)->subDays($day)->format('Y-m-d');
                    $reminderData = array(
                        'eventId' => $this->eventId,
                        'daysPrior' => $day,
                        'date' => $date,
                        // 'title' => $new_reminder_title[$key] ? $new_reminder_title[$key] : null,
                        // 'details' => $new_reminder_details[$key] ? $new_reminder_details[$key] : null,
                        'title' => $new_reminder_title[$key] ?? null,
                        'details' => $new_reminder_details[$key] ?? null,
                    );
                    $reminderResult = Reminder::create($reminderData);
                    if (!empty($new_reminderAssignedTo[$key])) {
                        foreach ($new_reminderAssignedTo[$key] as $assignUser) {
                            $reminderAssignData = array(
                                'reminderId' => $reminderResult->id,
                                'userId' => $assignUser
                            );
                            Assign::create($reminderAssignData);
                        }
                    }
                }
            }


            $this->mount();
            $this->resetEventFilters();
            session()->flash('success', 'Event added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function resetEventFilters()
    {
        $this->reset(['start_date', 'end_date', 'title', 'description', 'importance', 'clientId', 'assignedTo']);
        $this->reset(['daysPrior', 'reminder_title', 'reminder_details', 'reminderAssignedTo']);
    }

    public function render()
    {
        return view('livewire.addevent');
    }
}
