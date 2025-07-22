<?php

namespace Modules\Invoice\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\Client\App\Models\Client;
use App\Models\User;
use App\Models\Ratetype;
use App\Models\Time;
use App\Models\Cost;
use App\Models\Payment;
use App\Models\Trust;

use Carbon\Carbon;
use Modules\Billing\App\Models\Billing;

class InvoiceController extends Controller
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

        return view('invoice::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        $months = [];
        $currentMonth = now();

        // Loop through the past 12 months and the next 12 months
        for ($i = 0; $i < 36; $i++) {
            // Add months in descending order from the current date
            $date = $currentMonth->copy()->subMonths($i);
            $months[$date->format('Y-m')] = $date->format('F Y');
        }

        $data['months'] = $months;
        $data['clientList'] = Client::select('id', 'first_name', 'last_name')->where('status', 1)->get();

        return view('invoice::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function invoice_display($billingId, $clientId, $invoiceDate)
    {
        $data = array();
        // dd([
        //     'billingId' => $billingId,
        //     'clientId' => $clientId,
        //     'invoiceDate' => $invoiceDate,
        // ]);

        $billingDetails = Billing::find($billingId);
        $client_details = Client::with('stateDetails')->where('id', $clientId)->first();

        $initial_balance = $client_details->initial_balance;

        $timeList = Time::where('clientId', $clientId)
            //->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_work_amount = Time::where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $costList = Cost::select('id', 'date', 'description', 'charge')->where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_cost_amount = Cost::where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('charge');

        $paymentList = Payment::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_payment_amount = Payment::where('clientId', $clientId)
            ->where('refund', 0)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $total_refund_amount = Payment::where('clientId', $clientId)
            ->where('refund', 1)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $trustList = Trust::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_trust_deposit_amount = Trust::where('clientId', $clientId)
            ->where('refund', 0)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $total_trust_debit_amount = Trust::where('clientId', $clientId)
            ->where('refund', 1)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $total_balance_due = ($total_work_amount + $total_cost_amount + $initial_balance + $total_refund_amount) - $total_payment_amount;

        // invoice data
        $data = [
            'client' => $clientId,
            'invoiceDate' => $invoiceDate,
            'billingId' => $billingId,
            'client_details' => $client_details,
            'invoice_for' => Carbon::parse($invoiceDate)->format('M Y'),
            'invoice_date' => date('m/d/Y'),
            'timeList' => $timeList,
            'costList' => $costList,
            'paymentList' => $paymentList,
            'trustList' => $trustList,
            'total_work_amount' => $billingDetails->fees,
            'total_cost_amount' => $billingDetails->costs,
            'total_previous_balance' => $billingDetails->initial_balance,
            'total_payment_amount' => $billingDetails->payment,
            'total_refund_amount' => $billingDetails->refund,
            'total_payment_refund' => ($billingDetails->refund - $billingDetails->payment),
            'total_trust_deposit_amount' => $billingDetails->trust_credit,
            'total_trust_debit_amount' => $billingDetails->trust_debit,
            'total_trust_amount' => ($billingDetails->trust_credit - $billingDetails->trust_debit),
            'total_balance_due' => $billingDetails->balance_due,
        ];

        $data['parent_class'] = $this->parent_class;
        $data['child_class'] = $this->child_class;

        return view('invoice::display', $data);
    }

    public function downloadInvoice(Request $request)
    {
        $clientId = $request->clientId;
        $invoiceDate = $request->invoiceDate;
        $billingId = $request->billingId;

        $billingDetails = Billing::find($billingId);
        $client_details = Client::with('stateDetails')->where('id', $clientId)->first();

        $initial_balance = $client_details->initial_balance;

        $timeList = Time::where('clientId', $clientId)
            //->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_work_amount = Time::where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $costList = Cost::select('id', 'date', 'description', 'charge')->where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_cost_amount = Cost::where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('charge');

        $paymentList = Payment::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_payment_amount = Payment::where('clientId', $clientId)
            ->where('refund', 0)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $total_refund_amount = Payment::where('clientId', $clientId)
            ->where('refund', 1)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $trustList = Trust::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $total_trust_deposit_amount = Trust::where('clientId', $clientId)
            ->where('refund', 0)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $total_trust_debit_amount = Trust::where('clientId', $clientId)
            ->where('refund', 1)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$invoiceDate])
            ->sum('amount');

        $total_balance_due = ($total_work_amount + $total_cost_amount + $initial_balance + $total_refund_amount) - $total_payment_amount;

        // invoice data
        $invoiceData = [
            'client' => $clientId,
            'invoiceDate' => $invoiceDate,
            'client_details' => $client_details,
            'invoice_for' => Carbon::parse($invoiceDate)->format('M Y'),
            'invoice_date' => date('m/d/Y'),
            'timeList' => $timeList,
            'costList' => $costList,
            'paymentList' => $paymentList,
            'trustList' => $trustList,
            'total_work_amount' => $billingDetails->fees,
            'total_cost_amount' => $billingDetails->costs,
            'total_previous_balance' => $billingDetails->initial_balance,
            'total_payment_amount' => $billingDetails->payment,
            'total_refund_amount' => $billingDetails->refund,
            'total_payment_refund' => ($billingDetails->refund - $billingDetails->payment),
            'total_trust_deposit_amount' => $billingDetails->trust_credit,
            'total_trust_debit_amount' => $billingDetails->trust_debit,
            'total_trust_amount' => ($billingDetails->trust_debit -  $billingDetails->trust_credit),
            'total_balance_due' => $billingDetails->balance_due,
        ];



        // Render the Blade view to HTML
        $html = view('invoices.pdf', $invoiceData)->render();

        // Use Laravel's response() method to generate a PDF
        return response()->stream(function () use ($html) {
            $pdf = new \Mpdf\Mpdf();
            $pdf->WriteHTML($html);
            $pdf->Output('invoice.pdf', 'D');  // 'D' is for download
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="invoice.pdf"',
            // 'Content-Disposition' => 'inline; filename="invoice.pdf"',
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('invoice::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('invoice::edit');
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
