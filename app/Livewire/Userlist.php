<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Ratetype;

class Userlist extends Component
{
    public $first_name, $last_name, $title, $rateId=3, $email, $username, $password, $role;
    public $rateType, $userId, $user;
    public $searchFirstName = ''; // First name search field
    public $searchLastName = '';  // Last name search field
    protected $listeners = ['deleteUser' => 'deleteUser'];

    protected $rules = [
        'first_name' => 'required|max:100',
        'last_name' => 'required|max:100',
        'title' => 'nullable|max:255',
        'rateId' => 'nullable|max:11',
        'email' => 'required|email|unique:users,email|max:100',
        'username' => 'required|unique:users,username|max:100',
        'password' => 'required|min:6|max:100',
        'role' => 'required',
    ];

    public function render()
    {
        $this->rateType = Ratetype::select('id', 'title')->where('status', 1)->get();
        return view('livewire.userlist');
    }

    // Get the filtered users based on first and last name
    public function getFilteredUsersProperty()
    {
        // Query to filter users by first name and last name
        return User::with('rateType')->where('first_name', 'like', '%' . $this->searchFirstName . '%')
            ->where('last_name', 'like', '%' . $this->searchLastName . '%')
            ->get();
    }


    public function editUser($userId)
    {
        // Load the user's data when edit is triggered.
        $user = User::findOrFail($userId);
        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->title = $user->title;
        $this->rateId = $user->rateId;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->role = $user->role;
    }

    // Method to delete a user
    public function deleteUser($userId)
    {
        // Find the user by ID and delete
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            session()->flash('success', 'User deleted successfully.');
        } else {
            session()->flash('error', 'User not found.');
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
            'title' => $this->title,
            'rateId' => $this->rateId,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'role' => $this->role,
        );

        $result = User::create($data);
        if ($result) {
            $this->resetFilters();
            session()->flash('success', 'User added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function updateUser()
    {
        // Adjust the validation rules for update: exclude the current user from unique validation
        $this->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'title' => 'nullable|max:255',
            'rateId' => 'nullable|max:11',
            'email' => 'required|email|max:100|unique:users,email,' . $this->user->id,  // Exclude the current user's email from the unique check
            'username' => 'required|max:100|unique:users,username,' . $this->user->id,  // Exclude the current user's username from the unique check
            'password' => 'nullable|min:6|max:100',  // Password is optional during update
            'role' => 'required',
        ]);

        // Execution doesn't reach here if validation fails.

        $data = array(
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'title' => $this->title,
            'rateId' => $this->rateId,
            'email' => $this->email,
            'username' => $this->username,
            'role' => $this->role,
        );
        if ($this->password != '') {
            $data['password'] = $this->password;
        }

        $result = $this->user->update($data);
        if ($result) {
            $this->resetFilters();
            session()->flash('success', 'User updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function resetFilters()
    {
        $this->reset(['first_name', 'last_name', 'title', 'rateId', 'email', 'username', 'password', 'role']);
    }
}
