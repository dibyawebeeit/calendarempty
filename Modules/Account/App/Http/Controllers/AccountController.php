<?php

namespace Modules\Account\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\User;
use App\Models\Ratetype;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public $parent_class;
    public $child_class;

    function __construct()
    {
        $this->parent_class = "account";
        $this->child_class = "";
    }

    public function index()
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        return view('account::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('account::create');
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
        return view('account::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        if (Auth::user()->id != $id) {
            abort(401);
        }
        $data['id'] = $id;
        $data['ac_details'] = User::findOrFail($id);
        $data['rateType'] = Ratetype::select('id', 'title')->where('status', 1)->get();

        return view('account::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'title' => 'nullable|max:255',
            'rateId' => 'nullable|max:11',
            'email' => 'required|email|max:100|unique:users,email,' . $id,  // Exclude the current user's email from the unique check
            'username' => 'required|max:100|unique:users,username,' . $id,  // Exclude the current user's username from the unique check
        ]);

        // Execution doesn't reach here if validation fails.

        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'rateId' => $request->rateId,
            'email' => $request->email,
            'username' => $request->username,
        );

        $user = User::find($id);

        if ($request->oldPassword != '') {

            $passwordCheck = Auth::check(['password' => $request->oldPassword]);
            if ($passwordCheck) {
                $validated = $request->validate([
                    'newPassword' => 'required|min:6|max:100|same:newPassword2',
                ]);
                $data['password'] = $request->newPassword;
            } else {
                return redirect()->back()->with('error', 'Invalid Old Password!');
            }
        }



        $result = $user->update($data);
        if ($result) {
            return redirect()->back()->with('success', 'A/C updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
