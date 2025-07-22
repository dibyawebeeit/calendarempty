<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Client\App\Models\Client;
use App\Models\State;

class Clientlist extends Component
{
    public $first_name, $last_name, $address, $city, $stateId, $zipcode, $attorney_rate = 0.00, $legal_secretary_rate=0.00, $legal_assistant_rate=0.00, $initial_balance=0.00, $notes;
    public $stateList, $clientId, $client;
    public $searchFirstName = ''; // First name search field
    public $searchLastName = '';  // Last name search field
    // protected $listeners = ['deleteUser' => 'deleteUser'];

    protected $rules = [
        'first_name' => 'required|max:100',
        'last_name' => 'required|max:100',
        'address' => 'required|max:255',
        'city' => 'required|max:255',
        'stateId' => 'required|max:11',
        'zipcode' => 'required|max:5',
        'attorney_rate' => 'required|numeric|decimal:0,2',
        'legal_secretary_rate' => 'required|numeric|decimal:0,2',
        'legal_assistant_rate' => 'required|numeric|decimal:0,2',
        'initial_balance' => 'required|numeric|decimal:0,2',
    ];

    public function render()
    {
        $this->stateList = State::select('id', 'title')->where('status', 1)->get();
        return view('livewire.clientlist');
    }

    // Get the filtered users based on first and last name
    public function getFilteredClientsProperty()
    {
        // Query to filter users by first name and last name
        return Client::with('stateDetails')->where('first_name', 'like', '%' . $this->searchFirstName . '%')
            ->where('last_name', 'like', '%' . $this->searchLastName . '%')
            ->get();
    }


    public function editClient($clientId)
    {
        // Load the user's data when edit is triggered.
        $client = Client::findOrFail($clientId);
        $this->client = $client;
        $this->first_name = $client->first_name;
        $this->last_name = $client->last_name;
        $this->address = $client->address;
        $this->city = $client->city;
        $this->stateId = $client->stateId;
        $this->zipcode = $client->zipcode;
        $this->attorney_rate = $client->attorney_rate;
        $this->legal_secretary_rate = $client->legal_secretary_rate;
        $this->legal_assistant_rate = $client->legal_assistant_rate;
        $this->initial_balance = $client->initial_balance;
        $this->notes = $client->notes;
    }

    // Method to delete a user
    public function deleteClient($clientId)
    {
        // Find the client by ID and delete
        $client = Client::find($clientId);
        if ($client) {
            $client->delete();
            session()->flash('success', 'Client deleted successfully.');
        } else {
            session()->flash('error', 'Client not found.');
        }
    }

    // Method to clear the search fields
    public function resetSearch()
    {
        $this->searchFirstName = '';
        $this->searchLastName = '';
    }

    public function submit()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.

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
            $this->resetFilters();
            session()->flash('success', 'Client added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function updateClient()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

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


        $result = $this->client->update($data);
        if ($result) {
            $this->resetFilters();
            session()->flash('success', 'Client updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function resetFilters()
    {
        $this->reset(['first_name', 'last_name', 'address', 'city', 'stateId', 'zipcode', 'attorney_rate', 'legal_secretary_rate', 'legal_assistant_rate', 'initial_balance', 'notes']);
    }
}
