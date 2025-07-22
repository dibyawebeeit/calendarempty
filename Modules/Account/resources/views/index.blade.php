@extends('dashboard::layouts.master')
@section('title', 'My Account')

@section('content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" height="34">
        <tbody>
            <tr>
                <td valign="top" width="27"><img src="{{ asset('assets/images/cornerSmall.jpg') }}" width="25"
                        height="30"></td>
                <td colspan="2" width="439">
                    <table width="97%" border="0" cellspacing="0" cellpadding="0"
                        background="{{ asset('assets/images/blueBarTab.jpg') }}">
                        <tbody>
                            <tr>
                                <td height="12" width="67%">
                                    <div align="left"><img src="{{ asset('assets/images/blueBarStart.jpg') }}"
                                            width="36" height="15"><img
                                            src="{{ asset('assets/images/myAccountHdr.gif') }}"></div>
                                </td>
                                <td height="12" width="33%" align="right"><img
                                        src="{{ asset('assets/images/blueBarTail.jpg') }}" width="144" height="15">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
