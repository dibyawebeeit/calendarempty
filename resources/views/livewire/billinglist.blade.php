<div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" height="34">
        <tbody>
            <tr>
                <td valign="top" width="27"><img src="{{ asset('assets/images/cornerSmall.jpg') }}" width="25" height="30"></td>
                <td colspan="2" width="439">
                    <table width="97%" border="0" cellspacing="0" cellpadding="0"
                        background="{{ asset('assets/images/blueBarTab.jpg') }}">
                        <tbody>
                            <tr>
                                <td height="12" width="67%">
                                    <div align="left"><img src="{{ asset('assets/images/blueBarStart.jpg') }}"
                                            width="36" height="15"><img
                                            src="{{ asset('assets/images/billingHdr.gif') }}"></div>
                                </td>
                                <td height="12" width="33%" align="right"><img
                                        src="{{ asset('assets/images/blueBarTail.jpg') }}" width="144"
                                        height="15">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="10"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" height="35" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>
                    <table width="520" border="0" cellspacing="0" cellpadding="6">
                        <tbody>
                            <tr>
                                <td width="8"><img src="{{ asset('assets/images/clear.gif') }}" width="8"
                                        height="1"></td>
                                <td width="100%" class="frmToolHeader">BILLING</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td width="20"><img src="{{ asset('assets/images/clear.gif') }}" width="20" height="1"></td>
                <td width="100%">
                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
                                            <tr>
                                                <td class="frmHeader">CLIENT</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="500" border="0" cellspacing="0" cellpadding="1">
                        <tbody>
                            <tr>
                                <td class="frmBorder">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                        <tbody>
                                            <tr>
                                                <td class="frmBackground">
                                                    <form class="changeForm" name="searchForm" method="post"
                                                        action="">
                                                        <table width="100%" border="0" cellspacing="1"
                                                            cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="frmRequired">Select a
                                                                        client to modify billing for</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        Client:</td>
                                                                    <td class="frmInput">
                                                                        <select wire:model="clientId"
                                                                            wire:change="getClientDetails"
                                                                            class="inputstyle" style="width:306">
                                                                            <option value="">Select</option>
                                                                            @foreach ($clientList as $client)
                                                                                <option value="{{ $client['id'] }}">
                                                                                    {{ $client['first_name'] }}
                                                                                    {{ $client['last_name'] }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="5">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>


    @if ($clientDetails)
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td height="25"></td>
                </tr>
            </tbody>
        </table>
        <table width="100%" height="35" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table width="520" border="0" cellspacing="0" cellpadding="6">
                            <tbody>
                                <tr>
                                    <td width="8"><img src="{{ asset('assets/images/clear.gif') }}"
                                            width="8" height="1">
                                    </td>
                                    <td width="100%" class="frmToolHeader">UPDATE INVOICE</td>
                                    <td class="frmToolHeader" align="right">
                                        {{-- <input type="button" wire:click="createInvoice()" value="Create Invoice" class="frmButtonLong" > --}}
                                            <input type="button" value="Create Invoice" class="frmButtonLong" onclick="createInvoiceTab()">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td width="20"><img src="{{ asset('assets/images/clear.gif') }}" width="20"
                            height="1">
                    </td>
                    <td width="100%">
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                            height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form name="changeDateForm" method="post" action="">
                                            <input type="hidden" name="id" value="2">
                                            <table width="100%" border="0" cellspacing="1" cellpadding="4">
                                                <tbody>
                                                    <tr>
                                                        <td width="85" class="frmInput">INVOICE DATE:</td>
                                                        <td class="frmInput">
                                                            <select wire:model="invoiceDate"
                                                                wire:change="getInvoiceDetails" class="inputstyle"
                                                                style="width:200px">
                                                                @foreach ($monthList as $value => $label)
                                                                    <option value="{{ $value }}"
                                                                        @if ($value === now()->format('m/Y')) selected @endif>
                                                                        {{ $label }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </td>
                                                        <td width="100" align="right" class="frmInput">As of:
                                                            {{ $as_of_date }} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="1">
                            <tbody>
                                <tr>
                                    <td class="frmBorder">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                            <tbody>
                                                <tr>
                                                    <td class="frmBackground">
                                                        <table width="100%" border="0" cellspacing="1"
                                                            cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="85" class="frmInput"
                                                                        valign="top">
                                                                        CLIENT:</td>
                                                                    <td class="frmInput">
                                                                        {{ $clientDetails->first_name }}
                                                                        {{ $clientDetails->last_name }}
                                                                        <br>{{ $clientDetails->address }}
                                                                        <br>{{ $clientDetails->city }},
                                                                        {{ $clientDetails->stateDetails->title }},
                                                                        {{ $clientDetails->zipcode }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder"><img src="{{ asset('assets/images/clear.gif') }}"
                                            width="1" height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                            <tbody>
                                                <tr>
                                                    <td class="frmHeader">ADD ENTRY</td>
                                                    <td class="frmHeader"><input type="button" name="addTime"
                                                            value="Time" class="frmButton"
                                                            wire:click="toggleTimeEntry"></td>
                                                    <td class="frmHeader"><input type="button" name="addCost"
                                                            value="Cost" class="frmButton"
                                                            wire:click="toggleCostEntry"></td>
                                                    <td class="frmHeader"><input type="button" name="addPayment"
                                                            value="Payment" class="frmButton"
                                                            wire:click="togglePaymentEntry"></td>
                                                    <td class="frmHeader"><input type="button" name="addRefund"
                                                            value="Refund" class="frmButton"
                                                            wire:click="toggleRefundEntry"></td>
                                                    <td class="frmHeader"><input type="button"
                                                            name="addTrustDeposit" value="Trust Depst"
                                                            class="frmButton" wire:click="toggleTrustDepositEntry">
                                                    </td>
                                                    <td class="frmHeader"><input type="button" name="addTrustRefund"
                                                            value="Trust Debit" class="frmButton"
                                                            wire:click="toggleTrustRefundEntry"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="addTimeEntry" style="display: {{ $showTimeEntry ? 'block' : 'none' }};">
                            <table width="500" border="0" cellspacing="0" cellpadding="1">
                                <tbody>
                                    <tr>
                                        <td class="frmBorder">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                                <tbody>
                                                    <tr>
                                                        <td class="frmBackground">
                                                            @if ($timeDetails)
                                                                <form class="changeForm" name="changeTimeForm"
                                                                    wire:submit.prevent="updateTime">
                                                                @else
                                                                    <form class="changeForm" name="changeTimeForm"
                                                                        wire:submit.prevent="submitTime">
                                                            @endif

                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2" class="frmRequired">
                                                                            TIME
                                                                            (*Required Fields)</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date:</td>
                                                                        <td class="frmInput">
                                                                            <input type="date"
                                                                                wire:model="time_date" class="textbox"
                                                                                style="width:19">
                                                                            @error('time_date')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Billed By:</td>
                                                                        <td class="frmInput">
                                                                            <select wire:model="time_userId"
                                                                                class="inputstyle" style="width:306">
                                                                                <option value="">Select
                                                                                </option>
                                                                                @foreach ($userList as $user)
                                                                                    <option
                                                                                        value="{{ $user['id'] }}">
                                                                                        {{ $user['first_name'] }}
                                                                                        {{ $user['last_name'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('time_userId')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Billed As:</td>
                                                                        <td class="frmInput">
                                                                            <select wire:model="time_rateId"
                                                                                class="inputstyle" style="width:306">
                                                                                <option value="">Select
                                                                                </option>
                                                                                @foreach ($rateType as $rate)
                                                                                    <option
                                                                                        value="{{ $rate['id'] }}">
                                                                                        {{ $rate['title'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('time_rateId')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Description:</td>
                                                                        <td class="frmInput">
                                                                            <textarea wire:model="time_description" class="textfield" cols="42" rows="6" style="width:306"></textarea>
                                                                            @error('time_description')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Time Used:<br><span
                                                                                class="frmDescription">(in
                                                                                6
                                                                                minute
                                                                                increments = tenth of an
                                                                                hour)</span></td>
                                                                        <td class="frmInput">
                                                                            <input type="number" step="any"
                                                                                wire:model="time_timeused"
                                                                                value="0.00" class="textbox"
                                                                                style="width:50"> hours
                                                                            @error('time_timeused')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput">
                                                                            <input type="image"
                                                                                src="{{ asset('assets/images/btnSave.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                wire:click="cancelTime" value="Cancel"
                                                                                align="middle" alt="Cancel">
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td colspan="2" class="frmStatus">
                                                                            &nbsp;
                                                                            @if (session('error'))
                                                                                <div class="alert alert-danger">
                                                                                    {{ session('error') }}
                                                                                </div>
                                                                            @endif
                                                                            @if (session('success'))
                                                                                <div class="alert alert-success">
                                                                                    {{ session('success') }}
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div id="addCostEntry" style="display: {{ $showCostEntry ? 'block' : 'none' }};">
                            <table width="500" border="0" cellspacing="0" cellpadding="1">
                                <tbody>
                                    <tr>
                                        <td class="frmBorder">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                                <tbody>
                                                    <tr>
                                                        <td class="frmBackground">
                                                            @if ($costDetails)
                                                                <form class="changeForm" name="changeCostForm"
                                                                    wire:submit.prevent="updateCost">
                                                                @else
                                                                    <form class="changeForm" name="changeCostForm"
                                                                        wire:submit.prevent="submitCost">
                                                            @endif

                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2" class="frmRequired">
                                                                            COST
                                                                            (*Required Fields)</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date:</td>
                                                                        <td class="frmInput">
                                                                            <input type="date"
                                                                                wire:model="cost_date" maxlength="2"
                                                                                class="textbox" style="width:19">
                                                                            @error('cost_date')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Description:</td>
                                                                        <td class="frmInput">
                                                                            <textarea wire:model="cost_description" class="textfield" cols="42" rows="6" style="width:306"></textarea>
                                                                            @error('cost_description')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                            {{-- Use Standard Description: <select
                                                                                    name="standarddesc"
                                                                                    class="inputstyle"
                                                                                    style="width:306"
                                                                                    onchange="changeCostForm.description.value=changeCostForm.standarddesc.value">
                                                                                    <option></option>
                                                                                    <option value="Process Server">
                                                                                        Process Server</option>
                                                                                    <option value="Court Filing Fees">
                                                                                        Court Filing Fees</option>
                                                                                    <option value="Postage">Postage
                                                                                    </option>
                                                                                    <option value="Copies">Copies
                                                                                    </option>
                                                                                </select> --}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Charge:</td>
                                                                        <td class="frmInput">
                                                                            $ <input type="number" step="any"
                                                                                wire:model="cost_charge"
                                                                                class="textbox" style="width:50">
                                                                            @error('cost_charge')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput">
                                                                            <input type="image"
                                                                                src="{{ asset('assets/images/btnSave.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                wire:click="cancelCost" value="Cancel"
                                                                                align="middle" alt="Cancel">
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td colspan="2" class="frmStatus">
                                                                            &nbsp;
                                                                            @if (session('error'))
                                                                                <div class="alert alert-danger">
                                                                                    {{ session('error') }}
                                                                                </div>
                                                                            @endif
                                                                            @if (session('success'))
                                                                                <div class="alert alert-success">
                                                                                    {{ session('success') }}
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div id="addPaymentEntry" style="display: {{ $showPaymentEntry ? 'block' : 'none' }};">
                            <table width="500" border="0" cellspacing="0" cellpadding="1">
                                <tbody>
                                    <tr>
                                        <td class="frmBorder">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                                <tbody>
                                                    <tr>
                                                        <td class="frmBackground">
                                                            @if ($paymentDetails)
                                                                <form class="changeForm" name="changePaymentForm"
                                                                    wire:submit.prevent="updatePayment">
                                                                @else
                                                                    <form class="changeForm" name="changePaymentForm"
                                                                        wire:submit.prevent="submitPayment">
                                                            @endif

                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2" class="frmRequired">
                                                                            PAYMENT
                                                                            (*Required Fields)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date:</td>
                                                                        <td class="frmInput">
                                                                            <input type="date"
                                                                                wire:model="payment_date"
                                                                                maxlength="2" class="textbox"
                                                                                style="width:19">
                                                                            @error('payment_date')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Description:</td>
                                                                        <td class="frmInput">
                                                                            <input type="text"
                                                                                wire:model="payment_description"
                                                                                value="Payment" class="textbox"
                                                                                style="width:306">
                                                                            @error('payment_description')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Payment Amount:</td>
                                                                        <td class="frmInput">
                                                                            $ <input type="number" step="any"
                                                                                wire:model="payment_amount"
                                                                                value="0.00" class="textbox"
                                                                                style="width:50">
                                                                            @error('payment_amount')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput">
                                                                            <input type="image"
                                                                                src="{{ asset('assets/images/btnSave.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                wire:click="cancelPayment"
                                                                                value="Cancel" align="middle"
                                                                                alt="Cancel">
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td colspan="2" class="frmStatus">
                                                                            &nbsp;
                                                                            @if (session('error'))
                                                                                <div class="alert alert-danger">
                                                                                    {{ session('error') }}
                                                                                </div>
                                                                            @endif
                                                                            @if (session('success'))
                                                                                <div class="alert alert-success">
                                                                                    {{ session('success') }}
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div id="addRefundEntry" style="display: {{ $showRefundEntry ? 'block' : 'none' }};">
                            <table width="500" border="0" cellspacing="0" cellpadding="1">
                                <tbody>
                                    <tr>
                                        <td class="frmBorder">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                                <tbody>
                                                    <tr>
                                                        <td class="frmBackground">
                                                            @if ($refundDetails)
                                                                <form name="changeRefundForm" class="changeForm"
                                                                    wire:submit.prevent="updateRefund">
                                                                @else
                                                                    <form name="changeRefundForm" class="changeForm"
                                                                        wire:submit.prevent="submitRefund">
                                                            @endif

                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2" class="frmRequired">
                                                                            REFUND
                                                                            (*Required Fields)</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date:</td>
                                                                        <td class="frmInput">
                                                                            <input type="date"
                                                                                wire:model="refund_date"
                                                                                class="textbox" style="width:19">
                                                                            @error('refund_date')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Description:</td>
                                                                        <td class="frmInput">
                                                                            <input type="text"
                                                                                wire:model="refund_description"
                                                                                class="textbox" style="width:306">
                                                                            @error('refund_description')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Refund Amount:</td>
                                                                        <td class="frmInput">
                                                                            $ <input type="number" step="any"
                                                                                wire:model="refund_amount"
                                                                                class="textbox" style="width:50">
                                                                            @error('refund_amount')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput">
                                                                            <input type="image"
                                                                                src="{{ asset('assets/images/btnSave.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                wire:click="cancelRefund"
                                                                                value="Cancel" align="middle"
                                                                                alt="Cancel">
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td colspan="2" class="frmStatus">
                                                                            &nbsp;
                                                                            @if (session('error'))
                                                                                <div class="alert alert-danger">
                                                                                    {{ session('error') }}
                                                                                </div>
                                                                            @endif
                                                                            @if (session('success'))
                                                                                <div class="alert alert-success">
                                                                                    {{ session('success') }}
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div id="addTrustDepositEntry"
                            style="display: {{ $showTrustDepositEntry ? 'block' : 'none' }};">
                            <table width="500" border="0" cellspacing="0" cellpadding="1">
                                <tbody>
                                    <tr>
                                        <td class="frmBorder">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                                <tbody>
                                                    <tr>
                                                        <td class="frmBackground">
                                                            @if ($trustDepositDetails)
                                                                <form class="changeForm" name="changeTrustDepositForm"
                                                                    wire:submit.prevent="updateTrustDeposit">
                                                                @else
                                                                    <form class="changeForm"
                                                                        name="changeTrustDepositForm"
                                                                        wire:submit.prevent="submitTrustDeposit">
                                                            @endif

                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2" class="frmRequired">
                                                                            TRUST
                                                                            DEPOSIT (*Required Fields)</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date:</td>
                                                                        <td class="frmInput">
                                                                            <input type="date"
                                                                                wire:model="trust_deposit_date"
                                                                                class="textbox" style="width:19">
                                                                            @error('trust_deposit_date')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Description:</td>
                                                                        <td class="frmInput">
                                                                            <input type="text"
                                                                                wire:model="trust_deposit_description"
                                                                                class="textbox" style="width:306">
                                                                            @error('trust_deposit_description')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Amount:</td>
                                                                        <td class="frmInput">
                                                                            $ <input type="number"
                                                                                wire:model="trust_deposit_amount"
                                                                                class="textbox" style="width:50">
                                                                            @error('trust_deposit_amount')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput">
                                                                            <input type="image"
                                                                                src="{{ asset('assets/images/btnSave.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                wire:click="cancelTrustDeposit"
                                                                                value="Cancel" align="middle"
                                                                                alt="Cancel">
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td colspan="2" class="frmStatus">
                                                                            &nbsp;
                                                                            @if (session('error'))
                                                                                <div class="alert alert-danger">
                                                                                    {{ session('error') }}
                                                                                </div>
                                                                            @endif
                                                                            @if (session('success'))
                                                                                <div class="alert alert-success">
                                                                                    {{ session('success') }}
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div id="addTrustRefundEntry"
                            style="display: {{ $showTrustRefundEntry ? 'block' : 'none' }};">
                            <table width="500" border="0" cellspacing="0" cellpadding="1">
                                <tbody>
                                    <tr>
                                        <td class="frmBorder">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                                <tbody>
                                                    <tr>
                                                        <td class="frmBackground">
                                                            @if ($trustDebitDetails)
                                                                <form class="changeForm" name="changeTrustRefundForm"
                                                                    wire:submit.prevent="updateTrustDebit">
                                                                @else
                                                                    <form class="changeForm"
                                                                        name="changeTrustRefundForm"
                                                                        wire:submit.prevent="submitTrustDebit">
                                                            @endif

                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2" class="frmRequired">
                                                                            TRUST
                                                                            ACCOUNT DEBIT (*Required Fields)</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date:</td>
                                                                        <td class="frmInput">
                                                                            <input type="date"
                                                                                wire:model="trust_debit_date"
                                                                                class="textbox" style="width:19">
                                                                            @error('trust_debit_date')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Description:</td>
                                                                        <td class="frmInput">
                                                                            <input type="text"
                                                                                wire:model="trust_debit_description"
                                                                                class="textbox" style="width:306">
                                                                            @error('trust_debit_description')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Amount:</td>
                                                                        <td class="frmInput">
                                                                            $ <input type="number" step="any"
                                                                                wire:model="trust_debit_amount"
                                                                                class="textbox" style="width:50">
                                                                            @error('trust_debit_amount')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput">
                                                                            <input type="image"
                                                                                src="{{ asset('assets/images/btnSave.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                wire:click="cancelTrustDebit"
                                                                                value="Cancel" align="middle"
                                                                                alt="Cancel">
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td colspan="2" class="frmStatus">
                                                                            &nbsp;
                                                                            @if (session('error'))
                                                                                <div class="alert alert-danger">
                                                                                    {{ session('error') }}
                                                                                </div>
                                                                            @endif
                                                                            @if (session('success'))
                                                                                <div class="alert alert-success">
                                                                                    {{ session('success') }}
                                                                                </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                            height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                            <tbody>
                                                <tr>
                                                    <td class="frmHeader">FEES</td>
                                                    <td class="frmHeader" align="right"></td>
                                                    <td class="frmHeader" align="right"></td>
                                                    <td class="frmHeader" align="right" style="width:247px;"></td>
                                                    <td class="frmHeader" align="right">HOURS</td>
                                                    <td class="frmHeader" align="right">RATE</td>
                                                    <td class="frmHeader" align="right">AMOUNT</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($timeList)
                            @foreach ($timeList as $timeValue)
                                <table width="500" border="0" cellspacing="0" cellpadding="1">
                                    <tbody>
                                        <tr>
                                            <td class="frmBorder">
                                                <table width="100%" border="0" cellspacing="0"
                                                    cellpadding="1">
                                                    <tbody>
                                                        <tr>
                                                            <td class="frmBackground">
                                                                <table width="100%" border="0" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tbody>
                                            <tr>
                                                <td width="100%" valign="top"
                                                    background="{{ asset('assets/images/gradient_fill.gif') }}">
                                                    <table width="100%" border="0"
                                                        cellspacing="0" cellpadding="3">
                                                        <tbody>
                                                            <tr>
                                                                <td class="frmResultsSub"
                                                                    valign="top"
                                                                    align="center"
                                                                    width="75">
                                                                    <input type="image"
                                                                        src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                        id="Edit"
                                                                        value="Edit"
                                                                        alt="Edit"
                                                                        wire:click="editTime({{ $timeValue['id'] }})"
                                                                        onclick="event.preventDefault();">
                                                                    <img src="{{ asset('assets/images/clear.gif') }}"
                                                                        width="1"
                                                                        height="1">
                                                                    <input type="image"
                                                                        src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                        id="Delete"
                                                                        value="Delete"
                                                                        alt="Delete"
                                                                        onclick="confirmDeleteTime({{ $timeValue['id'] }})">
                                                                </td>
                                                                <td class="frmResultsSub"
                                                                    width="60"
                                                                    valign="top">
                                                                    <span class="frmResultsTxtOutput">
                                                                        {{ standard_date($timeValue['date']) }}
                                                                    </span>
                                                                </td>
                                                                <td class="frmResultsSub"
                                                                    width="60"
                                                                    valign="top">
                                                                    <span class="frmResultsTxtOutput">
                                                                        {{ user_short_form($timeValue['userId']) }}
                                                                    </span>
                                                                </td>
                                                                <td style="width:100px;" class="frmResultsSub"
                                                                    valign="top">
                                                                    <span
                                                                        class="frmResultsTxtOutput">{{ $timeValue['description'] }}</span>
                                                                </td>
                                                                <td style="text-align:right;"  class="frmResultsSub"
                                                                    valign="top">
                                                                    <span class="frmResultsTxtOutput">
                                                                        {{ format_number($timeValue['time']) }}
                                                                    </span>
                                                                </td>
                                                                <td style="text-align:right;"  class="frmResultsSub"
                                                                    valign="top">
                                                                    <span class="frmResultsTxtOutput">
                                                                        {{ client_rate($timeValue['clientId'], $timeValue['rateId']) }}
                                                                    </span>
                                                                </td>
                                                                <td style="text-align:right;" class="frmResultsSub"
                                                                    width="70"
                                                                    valign="top">
                                                                    <span
                                                                        class="frmResultsTxtOutput">
                                                                        {{ format_price($timeValue['amount']) }}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                            height="10">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder"><img src="{{ asset('assets/images/clear.gif') }}"
                                            width="1" height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                            <tbody>
                                                <tr>
                                                    <td class="frmHeader">COSTS</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($costList)
                            @foreach ($costList as $cost)
                                <table width="500" border="0" cellspacing="0" cellpadding="1">
                                    <tbody>
                                        <tr>
                                            <td class="frmBorder">
                                                <table width="100%" border="0" cellspacing="0"
                                                    cellpadding="1">
                                                    <tbody>
                                                        <tr>
                                                            <td class="frmBackground">
                                                                <table width="100%" border="0" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tbody>
                                        <tr>
                                            <td width="100%" valign="top"
                                                background="{{ asset('assets/images/gradient_fill.gif') }}">
                                                <table width="100%" border="0"
                                                    cellspacing="0" cellpadding="3">
                                                    <tbody>
                                                        <tr>
                                                            <td class="frmResultsSub"
                                                                valign="top"
                                                                align="center"
                                                                width="75">
                                                                <input type="image"
                                                                    src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                    id="Edit"
                                                                    value="Edit"
                                                                    alt="Edit"
                                                                    wire:click="editCost({{ $cost['id'] }})"
                                                                    onclick="event.preventDefault();">
                                                                <img src="{{ asset('assets/images/clear.gif') }}"
                                                                    width="1"
                                                                    height="1">
                                                                <input type="image"
                                                                    src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                    id="Delete"
                                                                    value="Delete"
                                                                    alt="Delete"
                                                                    onclick="confirmDeleteCost({{ $cost['id'] }})">
                                                            </td>
                                                            <td class="frmResultsSub"
                                                                width="60"
                                                                valign="top">
                                                                <span
                                                                    class="frmResultsTxtOutput">
                                                                    {{ standard_date($cost['date']) }}</span>
                                                            </td>
                                                            <td class="frmResultsSub"
                                                                valign="top">
                                                                <span
                                                                    class="frmResultsTxtOutput">{{ $cost['description'] }}</span>
                                                            </td>
                                                            <td class="frmResultsSub"
                                                                width="70"
                                                                valign="top">
                                                                <span
                                                                    class="frmResultsTxtOutput">
                                                                    {{ format_price($cost['charge']) }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            @endforeach
                        @endif

                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                            height="10">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder"><img src="{{ asset('assets/images/clear.gif') }}"
                                            width="1" height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                            <tbody>
                                                <tr>
                                                    <td class="frmHeader">PAYMENTS/REFUNDS</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($paymentList)
                            @foreach ($paymentList as $payment)
                                <table width="500" border="0" cellspacing="0" cellpadding="1">
                                    <tbody>
                                        <tr>
                                            <td class="frmBorder">
                                                <table width="100%" border="0" cellspacing="0"
                                                    cellpadding="1">
                                                    <tbody>
                                                        <tr>
                                                            <td class="frmBackground">
                                                                <table width="100%" border="0" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tbody>
                                        <tr>
                                            <td width="100%" valign="top"
                                                background="{{ asset('assets/images/gradient_fill.gif') }}">
                                                <table width="100%" border="0"
                                                    cellspacing="0" cellpadding="3">
                                                    <tbody>
                                                        <tr>
                                                            @if ($payment['refund'] == 0)
                                                                <td class="frmResultsSub"
                                                                    valign="top"
                                                                    align="center"
                                                                    width="75">
                                                                    <input
                                                                        type="image"
                                                                        src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                        id="Edit"
                                                                        value="Edit"
                                                                        alt="Edit"
                                                                        wire:click="editPayment({{ $payment['id'] }})"
                                                                        onclick="event.preventDefault();">
                                                                    <img src="{{ asset('assets/images/clear.gif') }}"
                                                                        width="1"
                                                                        height="1">
                                                                    <input
                                                                        type="image"
                                                                        src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                        id="Delete"
                                                                        value="Delete"
                                                                        alt="Delete"
                                                                        onclick="confirmDeletePayment({{ $payment['id'] }})">
                                                                </td>
                                                            @else
                                                                <td class="frmResultsSub"
                                                                    valign="top"
                                                                    align="center"
                                                                    width="75">
                                                                    <input
                                                                        type="image"
                                                                        src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                        id="Edit"
                                                                        value="Edit"
                                                                        alt="Edit"
                                                                        wire:click="editRefund({{ $payment['id'] }})"
                                                                        onclick="event.preventDefault();">
                                                                    <img src="{{ asset('assets/images/clear.gif') }}"
                                                                        width="1"
                                                                        height="1">
                                                                    <input
                                                                        type="image"
                                                                        src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                        id="Delete"
                                                                        value="Delete"
                                                                        alt="Delete"
                                                                        onclick="confirmDeleteRefund({{ $payment['id'] }})">
                                                                </td>
                                                            @endif
                                                            <td class="frmResultsSub"
                                                                width="60"
                                                                valign="top">
                                                                <span
                                                                    class="frmResultsTxtOutput">
                                                                    {{ standard_date($payment['date']) }}</span>
                                                            </td>
                                                            <td class="frmResultsSub"
                                                                valign="top">
                                                                <span
                                                                    class="frmResultsTxtOutput">{{ $payment['description'] }}</span>
                                                            </td>
                                                            <td class="frmResultsSub"
                                                                width="70"
                                                                valign="top">
                                                                <span
                                                                    class="frmResultsTxtOutput">
                                                                    {{ $payment['refund'] == 1 ? '' : '-' }}
                                                                    {{ format_price($payment['amount']) }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                            height="10">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder"><img src="{{ asset('assets/images/clear.gif') }}"
                                            width="1" height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                            <tbody>
                                                <tr>
                                                    <td class="frmHeader">TRUST ACCOUNT</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($trustList)
                            @foreach ($trustList as $trust)
                                <table width="500" border="0" cellspacing="0" cellpadding="1">
                                    <tbody>
                                        <tr>
                                            <td class="frmBorder">
                                                <table width="100%" border="0" cellspacing="0"
                                                    cellpadding="1">
                                                    <tbody>
                                                        <tr>
                                                            <td class="frmBackground">
                                                                <table width="100%" border="0" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tbody>
                                <tr>
                                    <td width="100%" valign="top"
                                        background="{{ asset('assets/images/gradient_fill.gif') }}">
                                        <table width="100%" border="0"
                                            cellspacing="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    @if ($trust['refund'] == 0)
                                                        <td class="frmResultsSub"
                                                            valign="top"
                                                            align="center"
                                                            width="75">
                                                            <input
                                                                type="image"
                                                                src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                id="Edit"
                                                                value="Edit"
                                                                alt="Edit"
                                                                wire:click="editTrustDeposit({{ $trust['id'] }})"
                                                                onclick="event.preventDefault();">
                                                            <img src="{{ asset('assets/images/clear.gif') }}"
                                                                width="1"
                                                                height="1">
                                                            <input
                                                                type="image"
                                                                src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                id="Delete"
                                                                value="Delete"
                                                                alt="Delete"
                                                                onclick="confirmDeleteTrustDeposit({{ $trust['id'] }})">
                                                        </td>
                                                    @else
                                                        <td class="frmResultsSub"
                                                            valign="top"
                                                            align="center"
                                                            width="75">
                                                            <input
                                                                type="image"
                                                                src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                id="Edit"
                                                                value="Edit"
                                                                alt="Edit"
                                                                wire:click="editTrustDebit({{ $trust['id'] }})"
                                                                onclick="event.preventDefault();">
                                                            <img src="{{ asset('assets/images/clear.gif') }}"
                                                                width="1"
                                                                height="1">
                                                            <input
                                                                type="image"
                                                                src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                id="Delete"
                                                                value="Delete"
                                                                alt="Delete"
                                                                onclick="confirmDeleteTrustDebit({{ $trust['id'] }})">
                                                        </td>
                                                    @endif
                                                    <td class="frmResultsSub"
                                                        width="60"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">
                                                            {{ standard_date($trust['date']) }}</span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">{{ $trust['description'] }}</span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        width="70"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">
                                                            {{ $trust['refund'] == 1 ? '-' : '' }}
                                                            {{ format_price($trust['amount']) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder"><img src="{{ asset('assets/images/clear.gif') }}"
                                            width="1" height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                            height="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                            <tbody>
                                                <tr>
                                                    <td class="frmHeader">SUMMARY</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="frmBackground">
                                                        <table width="100%" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                                <tr>
                                    <td width="100%" valign="top"
                                        background="{{ asset('assets/images/gradient_fill.gif') }}">
                                        <table width="100%" border="0"
                                            cellspacing="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td class="frmResultsSub"
                                                        valign="top"
                                                        align="center"
                                                        width="75">
                                                        <span
                                                            class="frmResultsTxtOutput"></span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        width="60"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput"></span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">Total
                                                            Current Work</span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        width="70"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">
                                                            {{ format_price($total_work_amount) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="frmBackground">
                                                        <table width="100%" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                        <tr>
                            <td width="100%" valign="top"
                                background="{{ asset('assets/images/gradient_fill.gif') }}">
                                <table width="100%" border="0"
                                    cellspacing="0" cellpadding="3">
                                    <tbody>
                                        <tr>
                                            <td class="frmResultsSub"
                                                valign="top"
                                                align="center"
                                                width="75">
                                                <span
                                                    class="frmResultsTxtOutput"></span>
                                            </td>
                                            <td class="frmResultsSub"
                                                width="60"
                                                valign="top">
                                                <span
                                                    class="frmResultsTxtOutput"></span>
                                            </td>
                                            <td class="frmResultsSub"
                                                valign="top">
                                                <span
                                                    class="frmResultsTxtOutput">Total
                                                    Costs</span>
                                            </td>
                                            <td class="frmResultsSub"
                                                width="70"
                                                valign="top">
                                                <span
                                                    class="frmResultsTxtOutput">
                                                    {{ format_price($total_cost_amount) }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="frmBackground">
                                                        <table width="100%" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                                    <tr>
                                        <td width="100%" valign="top"
                                            background="{{ asset('assets/images/gradient_fill.gif') }}">
                                            <table width="100%" border="0"
                                                cellspacing="0" cellpadding="3">
                                                <tbody>
                                                    <tr>
                                                        <td class="frmResultsSub"
                                                            valign="top"
                                                            align="center"
                                                            width="75">
                                                            <span
                                                                class="frmResultsTxtOutput"></span>
                                                        </td>
                                                        <td class="frmResultsSub"
                                                            width="60"
                                                            valign="top">
                                                            <span
                                                                class="frmResultsTxtOutput"></span>
                                                        </td>
                                                        <td class="frmResultsSub"
                                                            valign="top">
                                                            <span
                                                                class="frmResultsTxtOutput">Previous
                                                                Balance</span>
                                                        </td>
                                                        <td class="frmResultsSub"
                                                            width="70"
                                                            valign="top">
                                                            <span
                                                                class="frmResultsTxtOutput">
                                                                {{ format_price($total_previous_balance) }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="frmBackground">
                                                        <table width="100%" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                                <tr>
                                    <td width="100%" valign="top"
                                        background="{{ asset('assets/images/gradient_fill.gif') }}">
                                        <table width="100%" border="0"
                                            cellspacing="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td class="frmResultsSub"
                                                        valign="top"
                                                        align="center"
                                                        width="75">
                                                        <span
                                                            class="frmResultsTxtOutput"></span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        width="60"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput"></span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">Total
                                                            Payments/Refunds</span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        width="70"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">
                                                            {{ format_price($total_refund_amount - $total_payment_amount) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="frmBackground">
                                                        <table width="100%" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                            <tr>
                                <td width="100%" valign="top"
                                    background="{{ asset('assets/images/gradient_fill.gif') }}">
                                    <table width="100%" border="0"
                                        cellspacing="0" cellpadding="3">
                                        <tbody>
                                            <tr>
                                                <td class="frmResultsSub"
                                                    valign="top"
                                                    align="center"
                                                    width="75">
                                                    <span
                                                        class="frmResultsTxtOutput"></span>
                                                </td>
                                                <td class="frmResultsSub"
                                                    width="60"
                                                    valign="top">
                                                    <span
                                                        class="frmResultsTxtOutput"></span>
                                                </td>
                                                <td class="frmResultsSub"
                                                    valign="top">
                                                    <span
                                                        class="frmResultsTxtOutput">Trust
                                                        Account Current
                                                        Balance</span>
                                                </td>
                                                <td class="frmResultsSub"
                                                    width="70"
                                                    valign="top">
                                                    <span
                                                        class="frmResultsTxtOutput">
                                                        {{ format_price($total_trust_deposit_amount - $total_trust_debit_amount) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="frmBorder">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="frmBackground">
                                                        <table width="100%" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                                <tr>
                                    <td width="100%" valign="top"
                                        background="{{ asset('assets/images/gradient_fill.gif') }}">
                                        <table width="100%" border="0"
                                            cellspacing="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td class="frmResultsSub"
                                                        valign="top"
                                                        align="center"
                                                        width="75">
                                                        <span
                                                            class="frmResultsTxtOutput"></span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        width="60"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput"></span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">Balance
                                                            Due</span>
                                                    </td>
                                                    <td class="frmResultsSub"
                                                        width="70"
                                                        valign="top">
                                                        <span
                                                            class="frmResultsTxtOutput">
                                                            {{ format_price($total_balance_due) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td><img src="assets/images/clear.gif" width="1" height="1"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td height="25"></td>
                </tr>
            </tbody>
        </table>
    @endif


    <script>
        function confirmDeleteTime(id) {
            // Use SweetAlert2 for a customized confirmation dialog
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, call the Livewire deleteUser method
                    // Livewire.emit('deleteUser', userId);
                    @this.deleteTime(id);
                }
            });
        }

        function confirmDeleteCost(id) {
            // Use SweetAlert2 for a customized confirmation dialog
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, call the Livewire deleteUser method
                    // Livewire.emit('deleteUser', userId);
                    @this.deleteCost(id);
                }
            });
        }

        function confirmDeletePayment(id) {
            // Use SweetAlert2 for a customized confirmation dialog
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, call the Livewire deleteUser method
                    // Livewire.emit('deleteUser', userId);
                    @this.deletePayment(id);
                }
            });
        }

        function confirmDeleteRefund(id) {
            // Use SweetAlert2 for a customized confirmation dialog
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, call the Livewire deleteUser method
                    // Livewire.emit('deleteUser', userId);
                    @this.deleteRefund(id);
                }
            });
        }

        function confirmDeleteTrustDeposit(id) {
            // Use SweetAlert2 for a customized confirmation dialog
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, call the Livewire deleteUser method
                    // Livewire.emit('deleteUser', userId);
                    @this.deleteTrustDeposit(id);
                }
            });
        }

        function confirmDeleteTrustDebit(id) {
            // Use SweetAlert2 for a customized confirmation dialog
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, call the Livewire deleteUser method
                    // Livewire.emit('deleteUser', userId);
                    @this.deleteTrustDebit(id);
                }
            });
        }


    function createInvoiceTab() {
        const component = @this; // This gets the Livewire component context
        component.call('getInvoiceUrl').then(url => {
            window.open(url, '_blank');
        });
    }
    
    </script>
 

</div>