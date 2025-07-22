<?php

namespace Modules\Billing\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class BillingController extends Controller
{
    public $parent_class;
    public $child_class;

    function __construct()
    {
        $this->parent_class = "billing";
        $this->child_class = "";
    }

    public function index()
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        return view('billing::index', $data);
    }

    public function export_address()
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        return view('billing::export_address', $data);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('billing::create');
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
        return view('billing::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('billing::edit');
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
        //
    }
}
