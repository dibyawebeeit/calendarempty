<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Modules\Timecard\App\Models\Timecard;

class Timecardlist extends Component
{
    public $userId, $timeIn, $timeOut;
    public $userList, $id, $timecardData;

    public $searchUserID = ''; // User search field
    public $fromDate = ''; // From Date search field
    public $toDate = '';  // To Date search field

    protected $rules = [
        'userId' => 'required',
        'timeIn' => 'required|date',
        'timeOut' => 'required|date',
    ];

    public function render()
    {
        $this->userList = User::select('id', 'first_name', 'last_name')->where('status', 1)->get();
        return view('livewire.timecardlist');
    }

    public function submit()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.
        $isExist = Timecard::where('userId', $this->userId)->exists();
        if ($isExist) {
            session()->flash('error', 'User already exist!');
            return false;
        }
        $data = array(
            'userId' => $this->userId,
            'timeIn' => $this->timeIn,
            'timeOut' => $this->timeOut,
        );

        $result = Timecard::create($data);
        if ($result) {
            $this->resetFilters();
            session()->flash('success', 'Timecard added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function getFilteredTimecardsProperty()
    {
        // Query to filter users by first name and last name

        return Timecard::with('userDetails')
            ->where('userId', $this->searchUserID)
            // ->where('timeIn', 'like', '%' . $this->fromDate . '%')
            // ->where('timeOut', 'like', '%' . $this->toDate . '%')
            ->get();
    }

    // Method to clear the search fields
    public function resetSearch()
    {
        $this->searchUserID = '';
        $this->fromDate = '';
        $this->toDate = '';
    }

    public function editTimecard($id)
    {
        // Load the user's data when edit is triggered.
        $timecard = Timecard::findOrFail($id);
        $this->timecardData = $timecard;
        $this->userId = $timecard->userId;
        $this->timeIn = $timecard->timeIn;
        $this->timeOut = $timecard->timeOut;
    }

    public function updateTimecard()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.
        $data = array(
            'userId' => $this->userId,
            'timeIn' => $this->timeIn,
            'timeOut' => $this->timeOut,
        );

        $result = $this->timecardData->update($data);
        if ($result) {
            $this->resetFilters();
            session()->flash('success', 'Timecard updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    // Method to delete a user
    public function deleteTimecard($id)
    {
        // Find the user by ID and delete
        $timecard = Timecard::find($id);
        if ($timecard) {
            $timecard->delete();
            session()->flash('success', 'Timecard deleted successfully.');
        } else {
            session()->flash('error', 'Timecard not found.');
        }
    }

    public function resetFilters()
    {
        $this->reset(['userId', 'timeIn', 'timeOut']);
    }
}
