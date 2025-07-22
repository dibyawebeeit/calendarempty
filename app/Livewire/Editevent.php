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

class Editevent extends Component
{
    public $clientList = [];
    public $userList = [];
    public $newClientEntry = false;
    public $stateList;
    public $first_name, $last_name, $address, $city, $stateId, $zipcode, $attorney_rate, $legal_secretary_rate, $legal_assistant_rate, $initial_balance, $notes;

    public $start_date, $end_date, $title, $description, $importance, $clientId, $assignedTo = [];
    public $eventId, $daysPrior, $reminder_title, $reminder_details, $reminderAssignedTo = [];
    public $reminderId, $userId;
    public $eventDetails;
    public $reminderList;

    public $modalVisible = false;
    public $modalVisibleReminder = false;


    public function mount($eventId)
    {
        $this->eventId = $eventId;

        // Fetch your client list
        $this->clientList = Client::select('id', 'first_name', 'last_name')->where('status', 1)->orderBy('first_name', 'ASC')->get();
        $this->userList = User::select('id', 'first_name', 'last_name')->where('status', 1)->where('role', 0)->orderBy('first_name', 'ASC')->get();
        $this->stateList = State::select('id', 'title')->where('status', 1)->get();

        $event_details = Event::find($this->eventId);
        $this->start_date = $event_details->start_date;
        $this->end_date = $event_details->end_date;
        $this->title = $event_details->title;
        $this->description = $event_details->description;
        $this->importance = $event_details->importance;
        $this->clientId = $event_details->clientId;

        $assignUsersArray = array();
        $assignResult = Assign::with('userDetails')->where('eventId', $this->eventId)->get();
        if (!empty($assignResult)) {
            foreach ($assignResult as $value) {
                if ($value->userDetails) {
                    $assignUsersArray[] = $value->userDetails['id'];
                }
            }
        }
        $this->assignedTo = $assignUsersArray;



        $remindersArray = array();
        $reminderQuery = Reminder::where('eventId', $this->eventId)->get();
        if (!empty($reminderQuery)) {
            foreach ($reminderQuery as $item) {

                $assignResult2 = Assign::with('userDetails')->where('reminderId', $item['id'])->get();
                if (!empty($assignResult2)) {
                    foreach ($assignResult2 as $value) {
                        if ($value->userDetails) {
                            $assignUsersArray2[] = $value->userDetails['first_name'] . " " . $value->userDetails['last_name'];
                        }
                    }
                }
                if (!empty($assignUsersArray2)) {
                    $reminderAssignUsers = implode(', ', $assignUsersArray2);
                } else {
                    $reminderAssignUsers = "NA";
                }

                $remindersArray[] = array(
                    'reminderId' => $item['id'],
                    'daysPrior' => $item['daysPrior'],
                    'reminderDate' => $item['date'],
                    'reminderTitle' => $item['title'],
                    'reminderDesc' => $item['details'],
                    'reminderAssignUsers' => $reminderAssignUsers,
                );
            }
        }
        $this->reminderList = $remindersArray;
        // dd($remindersArray);
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

    public function openReminderModal()
    {
        $this->modalVisibleReminder = true;
    }

    public function closeReminderModal()
    {
        $this->modalVisibleReminder = false;
    }

    public function submitReminder()
    {
        $this->validate([
            'daysPrior' => 'required',
        ]);

        $date = Carbon::parse($this->start_date)->subDays($this->daysPrior)->format('Y-m-d');
        $reminderData = array(
            'eventId' => $this->eventId,
            'daysPrior' => $this->daysPrior,
            'date' => $date,
            'title' => $this->reminder_title,
            'details' => $this->reminder_details,
        );

        $reminderResult = Reminder::create($reminderData);
        if ($reminderResult) {
            if (!empty($this->reminderAssignedTo)) {
                foreach ($this->reminderAssignedTo as $assignUser) {
                    if ($assignUser != 0) {
                        $reminderAssignData = array(
                            'userId' => $assignUser,
                            'reminderId' => $reminderResult->id
                        );
                        Assign::create($reminderAssignData);
                    }
                }
            }

            $this->mount($this->eventId);
            $this->resetReminderFilters();
            $this->closeReminderModal();
            session()->flash('success', 'Reminder added successfully.');
        } else {
            $this->mount($this->eventId);
            $this->closeReminderModal();
            session()->flash('error', 'Something went wrong');
        }
    }

    public function resetReminderFilters()
    {
        $this->reset(['daysPrior', 'reminder_title', 'reminder_details', 'reminderAssignedTo']);
    }

    public function deleteReminder($reminderId)
    {
        $reminderList = Reminder::find($reminderId);

        if ($reminderList) {
            $reminderList->delete();
            Assign::where('reminderId', $reminderId)->delete();
            $this->mount($this->eventId);
            session()->flash('success', 'Reminder deleted successfully.');
        } else {
            session()->flash('error', 'Reminder not found.');
        }
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
            $this->mount($this->eventId);
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

    public function updateEvent()
    {
        $this->eventDetails = Event::find($this->eventId);

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

        $result = $this->eventDetails->update($data);
        if ($result) {

            // client assign 
            Assign::where('eventId', $this->eventId)->delete();
            if (!empty($this->assignedTo)) {
                foreach ($this->assignedTo as $user) {
                    $eventAssignData = array(
                        'eventId' => $this->eventId,
                        'userId' => $user
                    );
                    Assign::create($eventAssignData);
                }
            }

            $this->mount($this->eventId);
            session()->flash('success', 'Event updated successfully.');
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
        return view('livewire.editevent');
    }
}
