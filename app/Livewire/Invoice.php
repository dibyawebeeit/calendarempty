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

class Invoice extends Component
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

    public function mount()
    {
        // Fetch your client list
        $this->clientList = Client::select('id', 'first_name', 'last_name')->where('status', 1)->orderBy('first_name', 'ASC')->get();

        // Month From 2004 to Still Now
        $start = \Carbon\Carbon::createFromDate(2004, 1, 1)->startOfMonth();
        $end = now()->startOfMonth();
        $months = [];
        while ($start <= $end) {
            $months[$start->format('Y-m')] = $start->format('F Y');
            $start->addMonth();
        }
     

        $this->invoiceDate = Carbon::now()->format('Y-m');
        $this->monthList = array_reverse($months, true);
        $this->as_of_date = date('d/m/y');
    }

    public function  createInvoice()
    {
        $this->validate([
            'clientId' => 'required',
            'invoiceDate' => 'required',
        ]);
        
        $client_details = Client::with('stateDetails')->where('id', $this->clientId)->first();

        // $this->total_previous_balance = $client_details['initial_balance'];

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

    public function render()
    {
        return view('livewire.invoice');
    }
}
