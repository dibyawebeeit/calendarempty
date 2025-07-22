@extends('dashboard::layouts.master')
@section('title', 'Edit Account')

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
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td><img src="assets/images/clear.gif" width="1" height="10"></td>
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
                                <td width="100%" class="frmToolHeader">ACCOUNT INFO ADMINISTRATION</td>
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
                                <td class="frmBorder"><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                        height="1"></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="1"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
                                            <tr>
                                                <td class="frmHeader">EDIT</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="2"></td>
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
                                                    <form class="changeForm" name="changeForm" method="post"
                                                        action="{{ route('account.update', $id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <table width="100%" border="0" cellspacing="1"
                                                            cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="frmRequired">
                                                                        *Required Fields</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        *First Name:</td>
                                                                    <td class="frmInput">
                                                                        <input type="text" name="first_name"
                                                                            value="{{ $ac_details['first_name'] }}"
                                                                            class="textbox" style="width:306">
                                                                        @error('first_name')
                                                                            <span class="text-red-500">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        *Last Name:</td>
                                                                    <td class="frmInput">
                                                                        <input type="text" name="last_name"
                                                                            value="{{ $ac_details['last_name'] }}"
                                                                            class="textbox" style="width:306">
                                                                        @error('last_name')
                                                                            <span class="text-red-500">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        Title:</td>
                                                                    <td class="frmInput">
                                                                        <input type="text" name="title"
                                                                            value="{{ $ac_details['title'] }}"
                                                                            class="textbox" style="width:306">
                                                                        @error('title')
                                                                            <span class="text-red-500">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        Bill As Rate (default):</td>
                                                                    <td class="frmInput">
                                                                        <select name="rateID" class="inputstyle"
                                                                            style="width:306">
                                                                            <option value="">Select</option>
                                                                            @foreach ($rateType as $item)
                                                                                <option value="{{ $item['id'] }}"
                                                                                    {{ $ac_details['rateId'] == $item['id'] ? 'selected' : '' }}>
                                                                                    {{ $item['title'] }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('rateId')
                                                                            <span class="text-red-500">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        *E-mail:</td>
                                                                    <td class="frmInput">
                                                                        <input type="email" name="email"
                                                                            value="{{ $ac_details['email'] }}"
                                                                            class="textbox" style="width:306">
                                                                        @error('email')
                                                                            <span class="text-red-500">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        *Username:</td>
                                                                    <td class="frmInput">
                                                                        <input type="text" name="username"
                                                                            value="{{ $ac_details['username'] }}"
                                                                            class="textbox" style="width:306">
                                                                        @error('username')
                                                                            <span class="text-red-500">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        Current Password:</td>
                                                                    <td class="frmInput">
                                                                        <input type="password" name="oldPassword"
                                                                            value="" class="textbox"
                                                                            style="width:306">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        New Password:<br><span class="frmDescription">(6 or
                                                                            more
                                                                            characters)</span></td>
                                                                    <td class="frmInput">
                                                                        <input type="password" name="newPassword"
                                                                            value="" class="textbox"
                                                                            style="width:306">
                                                                        @error('newPassword')
                                                                            <span class="text-red-500">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        Re-type New Password:</td>
                                                                    <td class="frmInput">
                                                                        <input type="password" name="newPassword2"
                                                                            value="" class="textbox"
                                                                            style="width:306">
                                                                        @error('newPassword2')
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
                                                                            name="Save" value="Save" align="middle"
                                                                            alt="Save">
                                                                        &nbsp;<input type="image"
                                                                            src="{{ asset('assets/images/btnReset.gif') }}"
                                                                            name="Reset" value="Reset" align="middle"
                                                                            alt="Reset">
                                                                        &nbsp;<!--input type="image" src="images/btnCancel.gif" name="Cancel" value="Cancel" align="middle" alt="Cancel"-->
                                                                    </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td colspan="2" class="frmStatus">&nbsp;
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
                                                                <tr> </tr>
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
@endsection
