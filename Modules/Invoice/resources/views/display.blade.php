@extends('dashboard::layouts.master')
@section('title', 'Display Invoice')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    .invoice-header {
        font-size: 18px;
        font-weight: bold;
    }

    .invoice-details {
        margin-top: 20px;
        width:660px;
    }

    .invoice-details table {
        width: 100%;
        border-collapse: collapse;
    }

    .invoice-details th,
    .invoice-details td {
        /* border: 1px solid #ddd; */
        padding: 8px;
        text-align: left;
    }
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="34">
    <tbody>
        <tr>
            <td valign="top" width="27"><img src="{{ asset('assets/images/cornerSmall.jpg') }}" width="25"
                    height="30">
            </td>
            <td colspan="2" width="439">
                <table width="97%" border="0" cellspacing="0" cellpadding="0"
                    background="{{ asset('assets/images/blueBarTab.jpg') }}">
                    <tbody>
                        <tr>
                            <td height="12" width="67%">
                                <div align="left"><img src="{{ asset('assets/images/blueBarStart.jpg') }}"
                                        width="36" height="15">
                                    <!-- <img src="assets/images/eventsCalHdr.jpg"> -->
                                </div>
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

<table width="100%" height="35" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td>
                <table width="660" border="0" cellspacing="0" cellpadding="6">
                    <tbody>
                        <tr>
                            <td colspan="2" width="100%" class="frmToolHeader"> Display Invoice</td>
                        </tr>
                        <tr>
                            <td  colspan="2" style="text-align:right;"> <form action="{{ route('download.invoice') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="clientId" value="{{$client}}">
                                    <input type="hidden" name="invoiceDate" value="{{$invoiceDate}}">
                                    <input type="hidden" name="billingId" value="{{$billingId}}">
                                    <input type="submit" id="downloadInvoice" value="Download Invoice" class="frmButtonLong" >
                                </form>                              
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<div class="invoice-details">
    <table>
        <tr>
            <td align="center" valign="top" colspan="3" style="padding: 5px 15px; text-align:center;">
                <h2
                    style="font-family: &#39;Montserrat&#39;, sans-serif;font-size: 32px; line-height: 20px;font-weight: 700;color: #001b30;margin: 10px 0 13px;text-decoration: underline;">
                    {{ setting()->name }}</h2>
                <h4
                    style="margin: 0 0 6px 0;font-size: 20px;text-decoration: underline black 2px;line-height: 18px;">
                    {{ setting()->designation }}</h4>
                <h3 style="margin: 0 0 6px 0;font-size: 17px; line-height: 18px;"> 
                    {{ setting()->address1 }}<br>
                    {{ setting()->address2 }}<br>
                    {{ setting()->phone }}<br>
                    {{ setting()->email }}</h3>

            </td>
        </tr>
        <tr>
            <td align="left" valign="top" colspan="3" style="padding: 10px;">

                <table width="100%" border="0" class="admit_cart_bodyMiddleTbl"
                    style="border-collapse: collapse;border: 0;font-weight: 600;">
                    <tbody>
                        <tr>
                            <td align="left" valign="top" style="border: 0;padding: 2px 15px;width: 50%;">
                                {{ $client_details['first_name'] }} {{ $client_details['last_name'] }}</td>
                            <td align="left" valign="top" style="border: 0;padding: 2px 15px;width: 50%;"> </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="border: 0;padding: 2px 15px;width: 50%;">
                                {{ $client_details['address'] }}</td>
                            <td align="right" valign="top" style="border: 0;padding: 2px 15px;width: 50%; text-align:right;">
                                {{ standard_date($invoice_date) }}</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" style="border: 0;padding: 2px 15px; ">
                                {{ $client_details['city'] }}, {{ $client_details->stateDetails->title }},
                                {{ $client_details->zipcode }}</td>
                            <td align="right" valign="top" style="border: 0;padding: 2px 15px; text-align:right; "> Invoice for:
                                {{ $invoice_for }}</td>
                        </tr>



                    </tbody>
                </table>
            </td>
        </tr>
        @if ($timeList)
            <tr>
                <td align="left" valign="top" colspan="3" style="padding: 10px;">
                    <p
                        style="margin: 0 0 5px 0; font-size: 20px; line-height: 22px; text-align: left; padding-bottom: 10px; padding-top: 15px;">
                        FEES</p>
                    <table width="100%" border="0" class="admit_cart_bodyMiddleTbl"
                        style="border-collapse: collapse;border: 0;font-weight: 600;">
                        <tbody>
                            <tr>
                                <th align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;"></th>
                                <th align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;"></th>
                                <th align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;"></th>
                                 <th align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;">Hours</th>
                                <th align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;">Rate</th>
                                <th align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;">Amount</th>

                            </tr>
                            @foreach ($timeList as $timeValue)
                                <tr>
                                    <td align="left" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ standard_date($timeValue['date']) }} </td>
                                    <td align="left" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ user_short_form($timeValue['userId']) }} </td>
                                    <td align="center" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ $timeValue['description'] }}</td>
                                    <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;">
                                        {{ format_number($timeValue['time']) }}</td>
                                    <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;">
                                        {{ client_rate($timeValue['clientId'], $timeValue['rateId']) }}</td>
                                    <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;">
                                        {{ format_price($timeValue['amount']) }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </td>
            </tr>
        @endif

        @if ($costList)
            <tr>
                <td align="left" valign="top" colspan="3" style="padding: 10px;">
                    <p
                        style="margin: 0 0 5px 0; font-size: 20px; line-height: 22px; text-align: left; padding-bottom: 10px; padding-top: 15px;">
                        COSTS</p>
                    <table width="100%" border="0" class="admit_cart_bodyMiddleTbl"
                        style="border-collapse: collapse;border: 0;font-weight: 600;">
                        <tbody>
                            <tr>
                                <th colspan="3" align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;">Cost</th>

                            </tr>
                            @foreach ($costList as $cost)
                                <tr>
                                    <td align="left" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ standard_date($cost['date']) }}
                                    </td>
                                    <td align="center" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ $cost['description'] }}
                                    </td>
                                    <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;">
                                        {{ format_price($cost['charge']) }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif

        @if ($paymentList)
            <tr>
                <td align="left" valign="top" colspan="3" style="padding: 10px;">
                    <p
                        style="margin: 0 0 5px 0; font-size: 20px; line-height: 22px; text-align: left; padding-bottom: 10px; padding-top: 15px;">
                        PAYMENTS/REFUNDS</p>
                    <table width="100%" border="0" class="admit_cart_bodyMiddleTbl"
                        style="border-collapse: collapse;border: 0;font-weight: 600;">
                        <tbody>
                            <tr>
                                <th colspan="3" align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;">Amount
                                </th>

                            </tr>
                            @foreach ($paymentList as $payment)
                                <tr>
                                    <td align="left" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ standard_date($payment['date']) }}
                                    </td>
                                    <td align="center" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ $payment['description'] }}
                                    </td>
                                    <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;"> 
                                        {{ $payment['refund'] == 1 ? '' : '-' }} {{ format_price($payment['amount']) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif


        @if ($trustList)
            <tr>
                <td align="left" valign="top" colspan="3" style="padding: 10px;">
                    <p
                        style="margin: 0 0 5px 0; font-size: 20px; line-height: 22px; text-align: left; padding-bottom: 10px; padding-top: 15px;">
                        TRUST ACCOUNT</p>
                    <table width="100%" border="0" class="admit_cart_bodyMiddleTbl"
                        style="border-collapse: collapse;border: 0;font-weight: 600;">
                        <tbody>
                            <tr>
                                <th colspan="3" align="right"
                                    style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;">Amount
                                </th>

                            </tr>
                            @foreach ($trustList as $trust)
                                <tr>
                                    <td align="left" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ standard_date($trust['date']) }}</td>
                                    <td align="center" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ $trust['description'] }}</td>
                                    <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;"> 
                                        {{ $trust['refund'] == 1 ? '-' : '' }} {{ format_price($trust['amount']) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif

        <tr>
            <td align="left" valign="top" colspan="3" style="padding: 10px;">
                <p
                    style="margin: 0 0 5px 0; font-size: 20px; line-height: 22px; text-align: left; padding-bottom: 10px; padding-top: 15px;">
                    SUMMARY</p>
                <table width="100%" border="0" class="admit_cart_bodyMiddleTbl"
                    style="border-collapse: collapse;border: 0;font-weight: 600;">
                    <tbody>
                        <tr>
                            <th colspan="3" align="right"
                                style="border: 0;padding: 5px 5px; background: #f2f2f2; text-align:right;">Amount
                            </th>

                        </tr>
                        <tr>
                            <td align="left" valign="top" style="border: 0;padding: 5px 15px;"> </td>
                            <td align="left" valign="top" style="border: 0;padding: 5px 15px;">Current
                                Services Rendered
                            </td>
                            <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;"> 
                                {{ format_price($total_work_amount) }}</td>

                        </tr>

                        <tr>
                            <td align="center" valign="top" style="border: 0;padding: 5px 15px;"> </td>
                            <td align="left" valign="top" style="border: 0;padding: 5px 15px;"> Current Costs
                                Rendered</td>
                            <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;"> 
                                {{ format_price($total_cost_amount) }}</td>

                        </tr>

                        <tr>
                            <td align="center" valign="top" style="border: 0;padding: 5px 15px;"> </td>
                            <td align="left" valign="top" style="border: 0;padding: 5px 15px;"> Previous
                                Balance</td>
                            <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;"> 
                                {{ format_price($total_previous_balance) }}</td>

                        </tr>


                        <tr>
                            <td align="center" valign="top" style="border: 0;padding: 5px 15px;"> </td>
                            <td align="left" valign="top" style="border: 0;padding: 5px 15px;">
                                Payments/Refunds</td>
                            <td align="right" valign="top" style="border: 0; padding: 5px 5px;text-align:right;">
                                {{ format_price($total_payment_refund)  }}</td>

                        </tr>

                        <tr>
                            <td align="center" valign="top" style="border: 0;padding: 5px 15px;"> </td>
                            <td align="left" valign="top" style="border: 0;padding: 5px 15px;"> Trust Account
                                Current
                                Balance</td>
                            <td align="right" valign="top" style="border: 0; padding: 5px 5px; text-align:right;"> 
                                {{ format_price($total_trust_amount) }}</td>

                        </tr>

                        <tr>
                            <td align="center" valign="top" style="border: 0; padding: 20px 15px 5px;"> </td>
                            <td align="left" valign="top" style="border: 0;padding: 20px 15px 15px;"> Balance
                                Due</td>
                            <td align="right" valign="top" style="border: 0; padding: 20px 5px 15px; text-align:right;"> 
                                {{ format_price($total_balance_due) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>

    </table>
</div>

@endsection

@section('script')
<script>
    document.getElementById('downloadInvoice').addEventListener('click', function() {
        document.querySelector('form').submit();
    });
</script>
@endsection