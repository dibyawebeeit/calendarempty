<?php

namespace App\Livewire;

use App\Models\Cost;


use App\Models\Payment;
use App\Models\Ratetype;
use App\Models\Time;
use App\Models\Trust;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

use Modules\Billing\App\Models\Billing;
use Modules\Client\App\Models\Client;

class Billinglist extends Component
{
    public $clientId;
    public $clientDetails;
    public $clientList = [];
    public $userList = [];
    public $monthList = [];
    public $as_of_date;
    public $rateType;
    public $invoiceDate;

    public $timeId;
    public $timeDetails;
    public $costId;
    public $costDetails;
    public $paymentId;
    public $paymentDetails;
    public $refundId;
    public $refundDetails;
    public $trustDepositId;
    public $trustDepositDetails;
    public $trustDebitId;
    public $trustDebitDetails;

    public $showTimeEntry = false;
    public $showCostEntry = false;
    public $showPaymentEntry = false;
    public $showRefundEntry = false;
    public $showTrustDepositEntry = false;
    public $showTrustRefundEntry = false;

    public $timeList;
    public $costList;
    public $paymentList;
    public $trustList;

    public $total_work_amount;
    public $total_cost_amount;
    public $total_previous_balance;
    public $total_payment_amount;
    public $total_refund_amount;
    public $total_trust_deposit_amount;
    public $total_trust_debit_amount;
    public $total_balance_due;



    //Time Section
    public $time_date, $time_userId, $time_rateId, $time_description, $time_timeused, $time_amount;

    //Cost Section
    public $cost_date, $cost_description, $cost_charge;

    //Payment Section
    public $payment_date, $payment_description = "Payment", $payment_amount;

    //Refund Section
    public $refund_date, $refund_description = "Refund", $refund_amount;

    //Trust Deposit Section
    public $trust_deposit_date, $trust_deposit_description = "Deposit", $trust_deposit_amount;

    //Trust Debit Section
    public $trust_debit_date, $trust_debit_description = "Withdraw for Payment", $trust_debit_amount;

    public function mount()
    {
        // Fetch your client list
        $this->clientList = Client::select('id', 'first_name', 'last_name')->where('status', 1)->orderBy('first_name', 'ASC')->get();
        $this->userList = User::select('id', 'first_name', 'last_name')->where('status', 1)->orderBy('first_name', 'ASC')->get();
        $this->rateType = Ratetype::select('id', 'title')->where('status', 1)->get();

        // Month From 2004 to Still Now
        $start = \Carbon\Carbon::createFromDate(2004, 1, 1)->startOfMonth();
        $end = now()->startOfMonth();
        $months = [];
        while ($start <= $end) {
            $months[$start->format('Y-m')] = $start->format('F Y');
            $start->addMonth();
        }

        if (!$this->invoiceDate) {
            $this->invoiceDate = Carbon::now()->format('Y-m');
        }
        $this->monthList = array_reverse($months, true);
        $this->as_of_date = date('d/m/y');

        

        if ($this->clientId) {
            $receivedMonth = $this->invoiceDate;
            $billingMonth = Carbon::parse($receivedMonth . '-01')->startOfMonth();
            $client = Client::findOrFail($this->clientId);
            $previousMonth = Carbon::parse($billingMonth)->subMonth()->startOfMonth();

            $billingExist = Billing::where('client_id', $client->id)
            ->where('billing_month', $billingMonth)->exists();

            $previousBillingExist = Billing::where('client_id', $client->id)
            ->where('billing_month', $previousMonth)->exists();
            
            if($billingExist)
            {
                $lastBilling = Billing::where('client_id', $client->id)
                ->where('billing_month', $billingMonth)
                ->first();
                $this->total_previous_balance = $lastBilling->initial_balance;
            }
            else if($previousBillingExist)
            {
                $previousBilling = Billing::where('client_id', $client->id)
                ->where('billing_month', $previousMonth)
                ->first();
                $this->total_previous_balance = $previousBilling->balance_due;
            }
            else
            {
                $initialBalance = $client->initial_balance;
                $this->total_previous_balance = $initialBalance;
            }


            $this->timeList = Time::where('clientId', $this->clientId)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_work_amount = Time::where('clientId', $this->clientId)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->costList = Cost::select('id', 'date', 'description', 'charge')->where('clientId', $this->clientId)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_cost_amount = Cost::where('clientId', $this->clientId)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('charge');

            $this->paymentList = Payment::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $this->clientId)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_payment_amount = Payment::where('clientId', $this->clientId)
                ->where('refund', 0)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->total_refund_amount = Payment::where('clientId', $this->clientId)
                ->where('refund', 1)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->trustList = Trust::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $this->clientId)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_trust_deposit_amount = Trust::where('clientId', $this->clientId)
                ->where('refund', 0)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->total_trust_debit_amount = Trust::where('clientId', $this->clientId)
                ->where('refund', 1)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->total_balance_due = ($this->total_work_amount + $this->total_cost_amount + $this->total_previous_balance + $this->total_refund_amount) - $this->total_payment_amount;
            
        }
    }

    public function getInvoiceUrl()
    {
        $receivedMonth = $this->invoiceDate;
        // $billingMonth = Carbon::parse('2025-07-01')->startOfMonth();
        $billingMonth = Carbon::parse($receivedMonth . '-01')->startOfMonth();

        $client = Client::findOrFail($this->clientId);

        $previousMonth = Carbon::parse($billingMonth)->subMonth()->startOfMonth();

        $lastBilling = Billing::where('client_id', $client->id)
        ->where('billing_month', $previousMonth)
        ->first();

        $initialBalance = $lastBilling ? $lastBilling->balance_due : $client->initial_balance;

        $balanceDue = $initialBalance + $this->total_work_amount + $this->total_cost_amount - $this->total_payment_amount + $this->total_refund_amount;

        $billing = Billing::updateOrCreate(
            [
                'client_id' => $this->clientId,
                'billing_month' => $billingMonth,
            ],
            [
                'initial_balance' => $initialBalance,
                'fees'            => $this->total_work_amount,
                'costs'           => $this->total_cost_amount,
                'payment'         => $this->total_payment_amount,
                'refund'          => $this->total_refund_amount,
                'trust_credit'    => $this->total_trust_deposit_amount,
                'trust_debit'     => $this->total_trust_debit_amount,
                'balance_due'     => $initialBalance + $this->total_work_amount + $this->total_cost_amount - $this->total_payment_amount + $this->total_refund_amount,
            ]
        );

        return route('invoice.display', [
            'billingId' => $billing->id,
            'clientId' => $this->clientId,
            'invoiceDate' => $this->invoiceDate,
        ]);
    }

    public function createInvoice()
    {
        $client_details = Client::with('stateDetails')->where('id', $this->clientId)->first();
        // $this->total_previous_balance = $client_details->initial_balance;
        $receivedMonth = $this->invoiceDate;
        $billingMonth = Carbon::parse($receivedMonth . '-01')->startOfMonth();
        $client = Client::findOrFail($this->clientId);
        $previousMonth = Carbon::parse($billingMonth)->subMonth()->startOfMonth();

        $billingExist = Billing::where('client_id', $client->id)
        ->where('billing_month', $billingMonth)->exists();
        if($billingExist)
        {
            $lastBilling = Billing::where('client_id', $client->id)
            ->where('billing_month', $billingMonth)
            ->first();
            $initialBalance = $lastBilling->initial_balance;
            $this->total_previous_balance = $initialBalance;
        }
        else
        {
            $initialBalance = $client->initial_balance;
            $this->total_previous_balance = $initialBalance;
        }


        $this->timeList = Time::where('clientId', $this->clientId)
            //->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $this->total_work_amount = Time::where('clientId', $this->clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->sum('amount');

        $this->costList = Cost::select('id', 'date', 'description', 'charge')->where('clientId', $this->clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $this->total_cost_amount = Cost::where('clientId', $this->clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->sum('charge');

        $this->paymentList = Payment::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $this->clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $this->total_payment_amount = Payment::where('clientId', $this->clientId)
            ->where('refund', 0)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->sum('amount');

        $this->total_refund_amount = Payment::where('clientId', $this->clientId)
            ->where('refund', 1)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->sum('amount');

        $this->trustList = Trust::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $this->clientId)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->orderBy('id', 'DESC')
            ->get();

        $this->total_trust_deposit_amount = Trust::where('clientId', $this->clientId)
            ->where('refund', 0)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->sum('amount');

        $this->total_trust_debit_amount = Trust::where('clientId', $this->clientId)
            ->where('refund', 1)
            // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
            ->sum('amount');

        $this->total_balance_due = ($this->total_work_amount + $this->total_cost_amount + $this->total_previous_balance + $this->total_refund_amount) - $this->total_payment_amount;

        // invoice data
        $invoiceData = [
            'client' => $this->clientId,
            'invoiceDate' => $this->invoiceDate,
            'client_details' => $client_details,
            'invoice_for' => Carbon::parse($this->invoiceDate)->format('M Y'),
            'invoice_date' => date('m/d/Y'),
            'timeList' => $this->timeList,
            'costList' => $this->costList,
            'paymentList' => $this->paymentList,
            'trustList' => $this->trustList,
            'total_work_amount' => $this->total_work_amount,
            'total_cost_amount' => $this->total_cost_amount,
            'total_previous_balance' => $this->total_previous_balance,
            'total_payment_amount' => $this->total_payment_amount,
            'total_refund_amount' => $this->total_refund_amount,
            'total_payment_refund' => ($this->total_refund_amount - $this->total_payment_amount),
            'total_trust_deposit_amount' => $this->total_trust_deposit_amount,
            'total_trust_debit_amount' => $this->total_trust_debit_amount,
            'total_trust_amount' => ($this->total_trust_deposit_amount -  $this->total_trust_debit_amount),
            'total_balance_due' => $this->total_balance_due,
        ];

        // Render the Blade view to HTML
        $html = view('invoices.pdf', $invoiceData)->render();

        // Use Laravel's response() method to generate a PDF
        return response()->stream(function () use ($html) {
            $pdf = new \Mpdf\Mpdf();
            $pdf->WriteHTML($html);
            $pdf->Output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="invoice.pdf"',
        ]);
    }
    public function getClientDetails()
    {
        // Get the client details based on the selected client ID
        if ($this->clientId) {
            $this->clientDetails = Client::with('stateDetails')->find($this->clientId);  // Find client by ID

            $this->mount();
        } else {
            $this->clientDetails = null;  // Reset client details if no client is selected
        }
    }

    public function getInvoiceDetails()
    {
        if ($this->invoiceDate) {

            $receivedMonth = $this->invoiceDate;
            $billingMonth = Carbon::parse($receivedMonth . '-01')->startOfMonth();
            $client = Client::findOrFail($this->clientId);
            $previousMonth = Carbon::parse($billingMonth)->subMonth()->startOfMonth();
            $lastBilling = Billing::where('client_id', $client->id)
            ->where('billing_month', $previousMonth)
            ->first();
            $initialBalance = $lastBilling ? $lastBilling->initial_balance : $client->initial_balance;
            $this->total_previous_balance = $initialBalance;

            $this->timeList = Time::where('clientId', $this->clientId)
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_work_amount = Time::where('clientId', $this->clientId)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->costList = Cost::select('id', 'date', 'description', 'charge')->where('clientId', $this->clientId)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_cost_amount = Cost::where('clientId', $this->clientId)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('charge');

            $this->paymentList = Payment::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $this->clientId)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_payment_amount = Payment::where('clientId', $this->clientId)
                ->where('refund', 0)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->total_refund_amount = Payment::where('clientId', $this->clientId)
                ->where('refund', 1)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->trustList = Trust::select('id', 'date', 'description', 'amount', 'refund')->where('clientId', $this->clientId)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->orderBy('id', 'DESC')
                ->get();

            $this->total_trust_deposit_amount = Trust::where('clientId', $this->clientId)
                ->where('refund', 0)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->total_trust_debit_amount = Trust::where('clientId', $this->clientId)
                ->where('refund', 1)
                // ->whereRaw("DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")
                ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$this->invoiceDate])
                ->sum('amount');

            $this->total_balance_due = ($this->total_work_amount + $this->total_cost_amount + $this->total_previous_balance + $this->total_refund_amount) - $this->total_payment_amount;
            
        }
    }

    public function submitTime()
    {
        $this->validate([
            'time_date' => 'required|date|date_format:Y-m-d',
            'time_userId' => 'required|numeric',
            'time_rateId' => 'required|numeric',
            'time_description' => 'required',
            'time_timeused' => 'required',
        ], [
            'time_date.required' => 'This field is required.',
            'time_userId.required' => 'This field is required.',
            'time_rateId.required' => 'This field is required.',
            'time_description.required' => 'This field is required.',
            'time_timeused.required' => 'This field is required.',
        ]);

        $clientValue = Client::find($this->clientId);
        $attorney_rate = $clientValue->attorney_rate;
        $legal_secretary_rate = $clientValue->legal_secretary_rate;
        $legal_assistant_rate = $clientValue->legal_assistant_rate;

        if ($this->time_rateId == 1) {
            $exactAmount = $attorney_rate;
        } else if ($this->time_rateId == 2) {
            $exactAmount = $legal_secretary_rate;
        } else {
            $exactAmount = $legal_assistant_rate;
        }

        $amount = $this->time_timeused * $exactAmount;

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->time_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'userId' => $this->time_userId,
            'rateId' => $this->time_rateId,
            'description' => $this->time_description,
            'time' => $this->time_timeused,
            'amount' => $amount
        );

        $result = Time::create($data);
        if ($result) {
            $this->mount();
            $this->reset(['time_date', 'time_userId', 'time_rateId', 'time_description', 'time_timeused']);
            session()->flash('success', 'Time added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function cancelTime()
    {
        $this->reset(['time_date', 'time_userId', 'time_rateId', 'time_description', 'time_timeused']);
    }

    public function editTime($timeId)
    {
        $timeDetails = Time::findOrFail($timeId);
        $this->timeDetails = $timeDetails;
        $this->time_date = $timeDetails->date;
        $this->time_userId = $timeDetails->userId;
        $this->time_rateId = $timeDetails->rateId;
        $this->time_description = $timeDetails->description;
        $this->time_timeused = $timeDetails->time;

        $this->showTimeEntry = true;
    }

    public function updateTime()
    {
        $this->validate([
            'time_date' => 'required|date|date_format:Y-m-d',
            'time_userId' => 'required|numeric',
            'time_rateId' => 'required|numeric',
            'time_description' => 'required',
            'time_timeused' => 'required',
        ], [
            'time_date.required' => 'This field is required.',
            'time_userId.required' => 'This field is required.',
            'time_rateId.required' => 'This field is required.',
            'time_description.required' => 'This field is required.',
            'time_timeused.required' => 'This field is required.',
        ]);

        $clientValue = Client::find($this->clientId);
        $attorney_rate = $clientValue->attorney_rate;
        $legal_secretary_rate = $clientValue->legal_secretary_rate;
        $legal_assistant_rate = $clientValue->legal_assistant_rate;

        if ($this->time_rateId == 1) {
            $exactAmount = $attorney_rate;
        } else if ($this->time_rateId == 2) {
            $exactAmount = $legal_secretary_rate;
        } else {
            $exactAmount = $legal_assistant_rate;
        }

        $amount = $this->time_timeused * $exactAmount;

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->time_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'userId' => $this->time_userId,
            'rateId' => $this->time_rateId,
            'description' => $this->time_description,
            'time' => $this->time_timeused,
            'amount' => $amount
        );

        $result = $this->timeDetails->update($data);
        if ($result) {
            $this->mount();
            $this->reset(['time_date', 'time_userId', 'time_rateId', 'time_description', 'time_timeused']);
            session()->flash('success', 'Time updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function deleteTime($timeId)
    {
        $timeDetails = Time::find($timeId);

        if ($timeDetails) {
            $timeDetails->delete();
            $this->mount();
            session()->flash('success', 'Time deleted successfully.');
        } else {
            session()->flash('error', 'Time not found.');
        }
    }

    public function submitCost()
    {
        $this->validate([
            'cost_date' => 'required|date|date_format:Y-m-d',
            'cost_description' => 'required',
            'cost_charge' => 'required',
        ], [
            'cost_date.required' => 'This field is required.',
            'cost_description.required' => 'This field is required.',
            'cost_charge.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->cost_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->cost_description,
            'charge' => $this->cost_charge,
        );

        $result = Cost::create($data);
        if ($result) {
            $this->mount();
            $this->reset(['cost_date', 'cost_description', 'cost_charge']);
            session()->flash('success', 'Cost added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function cancelCost()
    {
        $this->reset(['cost_date', 'cost_description', 'cost_charge']);
    }

    public function editCost($costId)
    {
        $costDetails = Cost::findOrFail($costId);
        $this->costDetails = $costDetails;

        $this->cost_date = $costDetails->date;
        $this->cost_description = $costDetails->description;
        $this->cost_charge = $costDetails->charge;

        $this->showCostEntry = true;
    }

    public function updateCost()
    {
        $this->validate([
            'cost_date' => 'required|date|date_format:Y-m-d',
            'cost_description' => 'required',
            'cost_charge' => 'required',
        ], [
            'cost_date.required' => 'This field is required.',
            'cost_description.required' => 'This field is required.',
            'cost_charge.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->cost_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->cost_description,
            'charge' => $this->cost_charge,
        );

        $result = $this->costDetails->update($data);
        if ($result) {
            $this->mount();
            $this->reset(['cost_date', 'cost_description', 'cost_charge']);
            session()->flash('success', 'Cost updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function deleteCost($costId)
    {
        $costDetails = Cost::find($costId);

        if ($costDetails) {
            $costDetails->delete();
            $this->mount();
            session()->flash('success', 'Cost deleted successfully.');
        } else {
            session()->flash('error', 'Cost not found.');
        }
    }

    public function submitPayment()
    {
        $this->validate([
            'payment_date' => 'required|date|date_format:Y-m-d',
            'payment_description' => 'required',
            'payment_amount' => 'required',
        ], [
            'payment_date.required' => 'This field is required.',
            'payment_description.required' => 'This field is required.',
            'payment_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->payment_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->payment_description,
            'amount' => $this->payment_amount,
        );

        $result = Payment::create($data);
        if ($result) {
            $this->mount();
            $this->reset(['payment_date', 'payment_description', 'payment_amount']);
            session()->flash('success', 'Payment added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function cancelPayment()
    {
        $this->reset(['payment_date', 'payment_description', 'payment_amount']);
    }


    public function editPayment($paymentId)
    {
        $paymentDetails = Payment::findOrFail($paymentId);
        $this->paymentDetails = $paymentDetails;

        $this->payment_date = $paymentDetails->date;
        $this->payment_description = $paymentDetails->description;
        $this->payment_amount = $paymentDetails->amount;

        $this->showPaymentEntry = true;
    }

    public function updatePayment()
    {
        $this->validate([
            'payment_date' => 'required|date|date_format:Y-m-d',
            'payment_description' => 'required',
            'payment_amount' => 'required',
        ], [
            'payment_date.required' => 'This field is required.',
            'payment_description.required' => 'This field is required.',
            'payment_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->payment_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->payment_description,
            'amount' => $this->payment_amount,
        );

        $result = $this->paymentDetails->update($data);
        if ($result) {
            $this->mount();
            $this->reset(['payment_date', 'payment_description', 'payment_amount']);
            session()->flash('success', 'Payment updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function deletePayment($paymentId)
    {
        $paymentDetails = Payment::find($paymentId);

        if ($paymentDetails) {
            $paymentDetails->delete();
            $this->mount();
            session()->flash('success', 'Payment deleted successfully.');
        } else {
            session()->flash('error', 'Payment not found.');
        }
    }

    public function submitRefund()
    {
        $this->validate([
            'refund_date' => 'required|date|date_format:Y-m-d',
            'refund_description' => 'required',
            'refund_amount' => 'required',
        ], [
            'refund_date.required' => 'This field is required.',
            'refund_description.required' => 'This field is required.',
            'refund_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->refund_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->refund_description,
            'amount' => $this->refund_amount,
            'refund' => 1
        );

        $result = Payment::create($data);
        if ($result) {
            $this->mount();
            $this->reset(['refund_date', 'refund_description', 'refund_amount']);
            session()->flash('success', 'Refund added successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function cancelRefund()
    {
        $this->reset(['refund_date', 'refund_description', 'refund_amount']);
    }

    public function editRefund($refundId)
    {
        $refundDetails = Payment::findOrFail($refundId);
        $this->refundDetails = $refundDetails;

        $this->refund_date = $refundDetails->date;
        $this->refund_description = $refundDetails->description;
        $this->refund_amount = $refundDetails->amount;

        $this->showRefundEntry = true;
    }

    public function updateRefund()
    {
        $this->validate([
            'refund_date' => 'required|date|date_format:Y-m-d',
            'refund_description' => 'required',
            'refund_amount' => 'required',
        ], [
            'refund_date.required' => 'This field is required.',
            'refund_description.required' => 'This field is required.',
            'refund_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->refund_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->refund_description,
            'amount' => $this->refund_amount
        );

        $result = $this->refundDetails->update($data);
        if ($result) {
            $this->mount();
            $this->reset(['refund_date', 'refund_description', 'refund_amount']);
            session()->flash('success', 'Refund updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function deleteRefund($refundId)
    {
        $refundDetails = Payment::find($refundId);

        if ($refundDetails) {
            $refundDetails->delete();
            $this->mount();
            session()->flash('success', 'Refund deleted successfully.');
        } else {
            session()->flash('error', 'Refund not found.');
        }
    }

    public function submitTrustDeposit()
    {
        $this->validate([
            'trust_deposit_date' => 'required|date|date_format:Y-m-d',
            'trust_deposit_description' => 'required',
            'trust_deposit_amount' => 'required',
        ], [
            'trust_deposit_date.required' => 'This field is required.',
            'trust_deposit_description.required' => 'This field is required.',
            'trust_deposit_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->trust_deposit_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->trust_deposit_description,
            'amount' => $this->trust_deposit_amount,
        );

        $result = Trust::create($data);
        if ($result) {
            $this->mount();
            $this->reset(['trust_deposit_date', 'trust_deposit_description', 'trust_deposit_amount']);
            session()->flash('success', 'Deposit successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function cancelTrustDeposit()
    {
        $this->reset(['trust_deposit_date', 'trust_deposit_description', 'trust_deposit_amount']);
    }


    public function editTrustDeposit($trustDepositId)
    {
        $trustDepositDetails = Trust::findOrFail($trustDepositId);
        $this->trustDepositDetails = $trustDepositDetails;

        $this->trust_deposit_date = $trustDepositDetails->date;
        $this->trust_deposit_description = $trustDepositDetails->description;
        $this->trust_deposit_amount = $trustDepositDetails->amount;

        $this->showTrustDepositEntry = true;
    }

    public function updateTrustDeposit()
    {
        $this->validate([
            'trust_deposit_date' => 'required|date|date_format:Y-m-d',
            'trust_deposit_description' => 'required',
            'trust_deposit_amount' => 'required',
        ], [
            'trust_deposit_date.required' => 'This field is required.',
            'trust_deposit_description.required' => 'This field is required.',
            'trust_deposit_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->trust_deposit_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->trust_deposit_description,
            'amount' => $this->trust_deposit_amount,
        );

        $result = $this->trustDepositDetails->update($data);
        if ($result) {
            $this->mount();
            $this->reset(['trust_deposit_date', 'trust_deposit_description', 'trust_deposit_amount']);
            session()->flash('success', 'Deposit updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function deleteTrustDeposit($trustDepositId)
    {
        $trustDepositDetails = Trust::find($trustDepositId);

        if ($trustDepositDetails) {
            $trustDepositDetails->delete();
            $this->mount();
            session()->flash('success', 'Trust deleted successfully.');
        } else {
            session()->flash('error', 'Trust not found.');
        }
    }

    public function submitTrustDebit()
    {
        $this->validate([
            'trust_debit_date' => 'required|date|date_format:Y-m-d',
            'trust_debit_description' => 'required',
            'trust_debit_amount' => 'required',
        ], [
            'trust_debit_date.required' => 'This field is required.',
            'trust_debit_description.required' => 'This field is required.',
            'trust_debit_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->trust_debit_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->trust_debit_description,
            'amount' => $this->trust_debit_amount,
            'refund' => 1
        );

        $result = Trust::create($data);
        if ($result) {
            $this->mount();
            $this->reset(['trust_debit_date', 'trust_debit_description', 'trust_debit_amount']);
            session()->flash('success', 'Debit successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function cancelTrustDebit()
    {
        $this->reset(['trust_debit_date', 'trust_debit_description', 'trust_debit_amount']);
    }

    public function editTrustDebit($trustDebitId)
    {
        $trustDebitDetails = Trust::findOrFail($trustDebitId);
        $this->trustDebitDetails = $trustDebitDetails;

        $this->trust_debit_date = $trustDebitDetails->date;
        $this->trust_debit_description = $trustDebitDetails->description;
        $this->trust_debit_amount = $trustDebitDetails->amount;

        $this->showTrustRefundEntry = true;
    }

    public function updateTrustDebit()
    {
        $this->validate([
            'trust_debit_date' => 'required|date|date_format:Y-m-d',
            'trust_debit_description' => 'required',
            'trust_debit_amount' => 'required',
        ], [
            'trust_debit_date.required' => 'This field is required.',
            'trust_debit_description.required' => 'This field is required.',
            'trust_debit_amount.required' => 'This field is required.',
        ]);

        $data = array(
            'date' => Carbon::createFromFormat('Y-m-d', $this->trust_debit_date)->format('Y-m-d'),
            'clientId' => $this->clientId,
            'description' => $this->trust_debit_description,
            'amount' => $this->trust_debit_amount,
        );

        $result = $this->trustDebitDetails->update($data);
        if ($result) {
            $this->mount();
            $this->reset(['trust_debit_date', 'trust_debit_description', 'trust_debit_amount']);
            session()->flash('success', 'Trust Debit updated successfully.');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function deleteTrustDebit($trustDebitId)
    {
        $trustDebitDetails = Trust::find($trustDebitId);

        if ($trustDebitDetails) {
            $trustDebitDetails->delete();
            $this->mount();
            session()->flash('success', 'Trust deleted successfully.');
        } else {
            session()->flash('error', 'Trust not found.');
        }
    }

    // Method to toggle the visibility of the div
    public function toggleTimeEntry()
    {
        $this->timeDetails = null;
        $this->time_date = null;
        $this->time_userId = null;
        $this->time_rateId = null;
        $this->time_description = null;
        $this->time_timeused = null;

        $this->showTimeEntry = !$this->showTimeEntry; // Toggle the value of showTimeEntry
        // Hide other entries if TimeEntry is shown, or leave them as is if hidden
        if ($this->showTimeEntry) {
            $this->showCostEntry = false;
            $this->showPaymentEntry = false;
            $this->showRefundEntry = false;
            $this->showTrustDepositEntry = false;
            $this->showTrustRefundEntry = false;
        }
    }
    public function toggleCostEntry()
    {
        $this->costDetails = null;
        $this->cost_date = null;
        $this->cost_description = null;
        $this->cost_charge = null;

        $this->showCostEntry = !$this->showCostEntry; // Toggle the value of showCostEntry
        if ($this->showCostEntry) {
            $this->showTimeEntry = false;
            $this->showPaymentEntry = false;
            $this->showRefundEntry = false;
            $this->showTrustDepositEntry = false;
            $this->showTrustRefundEntry = false;
        }
    }
    public function togglePaymentEntry()
    {
        $this->paymentDetails = null;
        $this->payment_date = null;
        $this->payment_description = "Payment";
        $this->payment_amount = null;

        $this->showPaymentEntry = !$this->showPaymentEntry; // Toggle the value of showPaymentEntry
        if ($this->showPaymentEntry) {
            $this->showTimeEntry = false;
            $this->showCostEntry = false;
            $this->showRefundEntry = false;
            $this->showTrustDepositEntry = false;
            $this->showTrustRefundEntry = false;
        }
    }
    public function toggleRefundEntry()
    {
        $this->refundDetails = null;
        $this->refund_date = null;
        $this->refund_description = "Refund";
        $this->refund_amount = null;

        $this->showRefundEntry = !$this->showRefundEntry; // Toggle the value of showRefundEntry
        if ($this->showRefundEntry) {
            $this->showTimeEntry = false;
            $this->showCostEntry = false;
            $this->showPaymentEntry = false;
            $this->showTrustDepositEntry = false;
            $this->showTrustRefundEntry = false;
        }
    }
    public function toggleTrustDepositEntry()
    {
        $this->trustDepositDetails = null;
        $this->trust_deposit_date = null;
        $this->trust_deposit_description = "Deposit";
        $this->trust_deposit_amount = null;

        $this->showTrustDepositEntry = !$this->showTrustDepositEntry; // Toggle the value of showTrustDepositEntry
        if ($this->showTrustDepositEntry) {
            $this->showTimeEntry = false;
            $this->showCostEntry = false;
            $this->showPaymentEntry = false;
            $this->showRefundEntry = false;
            $this->showTrustRefundEntry = false;
        }
    }
    public function toggleTrustRefundEntry()
    {
        $this->trustDebitDetails = null;
        $this->trust_debit_date = null;
        $this->trust_debit_description = "Withdraw for Payment";
        $this->trust_debit_amount = null;

        $this->showTrustRefundEntry = !$this->showTrustRefundEntry; // Toggle the value of showTrustRefundEntry
        if ($this->showTrustRefundEntry) {
            $this->showTimeEntry = false;
            $this->showCostEntry = false;
            $this->showPaymentEntry = false;
            $this->showRefundEntry = false;
            $this->showTrustDepositEntry = false;
        }
    }

    public function render()
    {
        return view('livewire.billinglist');
    }
}
