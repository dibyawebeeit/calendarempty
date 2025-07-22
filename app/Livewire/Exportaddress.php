<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Client\App\Models\Client;

class Exportaddress extends Component
{
    public $clientList;
    public $clientIds = [];
    public $errorMessage = ''; // Variable to store error message


    public function mount()
    {
        // Fetch your client list
        $this->clientList = Client::select('id', 'first_name', 'last_name')->where('status', 1)->orderBy('first_name', 'ASC')->get();
    }

    public function exportAddress()
    {
        // Check if clientIds is empty
        if (empty($this->clientIds)) {
            // Set error message
            $this->errorMessage = 'Please select at least one client to export their address.';
            return;
        }

        $addressList = Client::with('stateDetails')->whereIn('id', $this->clientIds)->get();
        $invoiceData = array(
            'addressList' => $addressList
        );


        // Render the Blade view to HTML
        $html = view('invoices.exportaddress', $invoiceData)->render();

        // Use Laravel's response() method to generate a PDF
        return response()->stream(function () use ($html) {
            $pdf = new \Mpdf\Mpdf();
            $pdf->WriteHTML($html);
            $pdf->Output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="clientAddress.pdf"',
        ]);
    }

    public function cancelExport()
    {
        $this->clientIds = [];
        $this->errorMessage = "";
        $this->mount();
    }

    public function render()
    {
        return view('livewire.exportaddress');
    }
}
