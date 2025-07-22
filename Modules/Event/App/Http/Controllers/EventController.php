<?php

namespace Modules\Event\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use Modules\Event\App\Models\Event;
use Modules\Client\App\Models\Client;
use App\Models\User;
use Modules\Event\App\Models\Reminder;
use Modules\Event\App\Models\Assign;

use Carbon\Carbon;

class EventController extends Controller
{
    public $parent_class;
    public $child_class;

    function __construct()
    {
        $this->parent_class = "event";
        $this->child_class = "";
    }

    public function index()
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        $data['optional_class'] = "calendar_filter";

        return view('event::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        return view('event::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        $assignUsersArray = array();
        $assignUsersArray2 = array();
        $remindersArray = array();

        $details = Event::findOrFail($id);
        $client = Client::find($details['clientId']);

        $assignResult = Assign::with('userDetails')->where('eventId', $details['id'])->get();
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

        $reminderQuery = Reminder::where('eventId', $details['id'])->get();
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
        // dd($reminderQuery);

        $data['eventDetails'] = array(
            'eventId' => $details['id'],
            'date' => Carbon::parse($details['start_date'])->format('F j, Y (l)'),
            'time' => Carbon::parse($details['start_date'])->format('g:i A'),
            'end_date' => Carbon::parse($details['end_date'])->format('l, M j, Y, g:i a'),
            'title' => $details['title'],
            'description' => $details['description'],
            'client' => $client ? $client['first_name'] . " " . $client['last_name'] : "NA",
            'eventAssignUsers' => $eventAssignUsers,
            'remindersArray' => $remindersArray
        );

        // dd($data['eventDetails']);
        return view('event::show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        $details = Event::findOrFail($id);
        $data['id'] = $id;

        return view('event::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Event::where('id', $id)->delete();
        if ($result == true) {
            return redirect()->back()->with('success', 'Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
