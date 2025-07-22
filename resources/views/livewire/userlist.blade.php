<div>
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
                                            src="{{ asset('assets/images/administrationHdr.gif') }}"></div>
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
                                <td width="8"><img src="{{ asset('assets/images/clear.gif') }}" width="8"
                                        height="1"></td>
                                <td width="100%" class="frmToolHeader">USERS ADMINISTRATION</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>

        </tbody>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td width="20" style="font-size:8px; line-height:8px;"><img
                        src="{{ asset('assets/images/clear.gif') }}" width="20" height="1"></td>
                <td width="100%">
                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tbody>


                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
                                            <tr>
                                                <td style="height:5px;"></td>
                                            </tr>
                                            <tr>
                                                <td class="frmHeader">SEARCH</td>
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
                                                    <form class="searchForm" name="searchForm"
                                                        wire:submit.prevent="getFilteredUsersProperty">
                                                        <table width="100%" border="0" cellspacing="1"
                                                            cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="frmRequired">Search
                                                                        for the users you would like to modify
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        First Name:</td>
                                                                    <td class="frmInput">
                                                                        <input type="text" class="textbox"
                                                                            wire:model="searchFirstName" value=""
                                                                            style="width:306px;"><br>Separate
                                                                        multiple names with a blank
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        Last Name:</td>
                                                                    <td class="frmInput">
                                                                        <input type="text" class="textbox"
                                                                            wire:model="searchLastName" value=""
                                                                            style="width:306px;"><br>Separate
                                                                        multiple names with a blank
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                    </td>
                                                                    <td align="right" class="frmInput">
                                                                        <input type="image"
                                                                            src="{{ asset('assets/images/btnSearch.gif') }}"
                                                                            name="Search" value="Search"
                                                                            alt="Search">
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

                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tbody>


                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
                                            <tr>
                                                <td class="frmHeader">ADD/EDIT</td>
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
                                                    @if ($user)
                                                        <form class="changeForm" name="changeForm"
                                                            wire:submit.prevent="updateUser">
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
                                                                            <input type="text"
                                                                                wire:model="first_name" value=""
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
                                                                            <input type="text"
                                                                                wire:model="last_name" value=""
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
                                                                            <input type="text" wire:model="title"
                                                                                value="" class="textbox"
                                                                                style="width:306">
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
                                                                            <select wire:model="rateId"
                                                                                class="inputstyle" style="width:306">
                                                                                {{-- <option value="">Select</option> --}}
                                                                                @foreach ($rateType as $item)
                                                                                    <option
                                                                                        value="{{ $item['id'] }}">
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
                                                                            <input type="text" wire:model="email"
                                                                                value="" class="textbox"
                                                                                style="width:306">
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
                                                                            <input type="text"
                                                                                wire:model="username" value=""
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
                                                                            Create New Password:<br><span
                                                                                class="frmDescription">(6
                                                                                or
                                                                                more
                                                                                characters)</span></td>
                                                                        <td class="frmInput">
                                                                            <input type="text"
                                                                                wire:model="password" value=""
                                                                                class="textbox" style="width:306">
                                                                            @error('password')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Administrator ?:</td>
                                                                        <td class="frmInput">
                                                                            <input type="radio" class="radiostyle"
                                                                                wire:model="role"
                                                                                value="1">&nbsp;Yes&nbsp;
                                                                            <input type="radio" class="radiostyle"
                                                                                wire:model="role" value="0"
                                                                                checked>&nbsp;No
                                                                            @error('role')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput"> <input
                                                                                type="image"
                                                                                src="{{ asset('assets/images/btnSave.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                name="Cancel" value="Cancel"
                                                                                align="middle" alt="Cancel">
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
                                                    @else
                                                        <form class="changeForm" name="changeForm"
                                                            wire:submit.prevent="submit">
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
                                                                            <input type="text"
                                                                                wire:model="first_name" value=""
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
                                                                            <input type="text"
                                                                                wire:model="last_name" value=""
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
                                                                            <input type="text" wire:model="title"
                                                                                value="" class="textbox"
                                                                                style="width:306">
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
                                                                            <select wire:model="rateId"
                                                                                class="inputstyle" style="width:306">
                                                                                {{-- <option value="">Select</option> --}}
                                                                                @foreach ($rateType as $item)
                                                                                    <option
                                                                                        value="{{ $item['id'] }}">
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
                                                                            <input type="text" wire:model="email"
                                                                                value="" class="textbox"
                                                                                style="width:306">
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
                                                                            <input type="text"
                                                                                wire:model="username" value=""
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
                                                                            *Password:<br><span
                                                                                class="frmDescription">(6
                                                                                or
                                                                                more
                                                                                characters)</span></td>
                                                                        <td class="frmInput">
                                                                            <input type="text"
                                                                                wire:model="password" value=""
                                                                                class="textbox" style="width:306">
                                                                            @error('password')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Administrator ?:</td>
                                                                        <td class="frmInput">
                                                                            <input type="radio" class="radiostyle"
                                                                                wire:model="role"
                                                                                value="1">&nbsp;Yes&nbsp;
                                                                            <input type="radio" class="radiostyle"
                                                                                wire:model="role" value="0"
                                                                                checked>&nbsp;No
                                                                            @error('role')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                        </td>
                                                                        <td align="right" class="frmInput"> <input
                                                                                type="image"
                                                                                src="{{ asset('assets/images/btnAdd.gif') }}"
                                                                                name="Add" value="Add"
                                                                                align="middle" alt="Add">
                                                                            &nbsp;<input type="image"
                                                                                src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                                name="Cancel" value="Cancel"
                                                                                align="middle" alt="Cancel">
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
                                                    @endif

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

                    @if ($searchFirstName || $searchLastName)
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
                                                    <td class="frmHeader">SEARCH RESULTS</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1"
                                            height="2">
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
                                                @forelse($this->filteredUsers as $user)
                                                    <tr>
                                                        <td class="frmBackground">
                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="80" valign="top"
                                                                            background="{{ asset('assets/images/gradient_fill.gif') }}">
                                                                            <table width="100%" border="0"
                                                                                cellspacing="0" cellpadding="3">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top"
                                                                                            align="center">
                                                                                            <form
                                                                                                name="EDITDELETEFORM1"
                                                                                                id="EDITDELETEFORM1"
                                                                                                method="post"
                                                                                                action=""
                                                                                                onsubmit="return processAction(EDITDELETEFORM1);">
                                                                                                <input type="hidden"
                                                                                                    name="SubmitAction"
                                                                                                    id="SubmitAction">
                                                                                                <input type="hidden"
                                                                                                    name="searchFirstName"
                                                                                                    value="">
                                                                                                <input type="hidden"
                                                                                                    name="searchLastName"
                                                                                                    value="">
                                                                                                <input type="hidden"
                                                                                                    name="indexid"
                                                                                                    value="2">
                                                                                                <input type="image"
                                                                                                    src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                                                    name="Edit"
                                                                                                    id="Edit"
                                                                                                    value="Edit"
                                                                                                    alt="Edit"
                                                                                                    wire:click="editUser({{ $user->id }})"
                                                                                                    onclick="event.preventDefault();">
                                                                                                <br>
                                                                                                <img src="{{ asset('assets/images/clear.gif') }}"
                                                                                                    width="1"
                                                                                                    height="3"><br>
                                                                                                <input type="image"
                                                                                                    src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                                                    name="Delete"
                                                                                                    id="Delete"
                                                                                                    value="Delete"
                                                                                                    alt="Delete"
                                                                                                    onclick="confirmDeletion({{ $user->id }})">


                                                                                            </form>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td valign="top">
                                                                            <table width="100%" border="0"
                                                                                cellspacing="0" cellpadding="1">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="frmDescription">
                                                                                            <table width="100%"
                                                                                                border="0"
                                                                                                cellspacing="1"
                                                                                                cellpadding="3">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="frmResultsMain">
                                                                                                            Name:&nbsp;<span
                                                                                                                class="frmResultsTxtOutput">{{ $user->first_name }}
                                                                                                                {{ $user->last_name }}</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="frmResultsSub">
                                                                                                            Title:&nbsp;<span
                                                                                                                class="frmResultsTxtOutput">{{ $user->title }}</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="frmResultsSub">
                                                                                                            Bill As
                                                                                                            Rate:&nbsp;<span
                                                                                                                class="frmResultsTxtOutput">{{ $user->rateType ? $user->rateType->title : 'NA' }}</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="frmResultsSub">
                                                                                                            E-mail:&nbsp;<span
                                                                                                                class="frmResultsTxtOutput">{{ $user->email }}</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="frmResultsSub">
                                                                                                            Username:&nbsp;<span
                                                                                                                class="frmResultsTxtOutput">{{ $user->username }}</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="frmResultsSub">
                                                                                                            Password:&nbsp;<span
                                                                                                                class="frmResultsTxtOutput">********</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="frmResultsSub">
                                                                                                            Administrator
                                                                                                            ?:&nbsp;<span
                                                                                                                class="frmResultsTxtOutput">{{ $user->role == 1 ? 'Yes' : 'No' }}</span>
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
                                                @empty
                                                    <p>No users found matching your search criteria.</p>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif


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
    <script>
        function confirmDeletion(userId) {
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
                    @this.deleteUser(userId);
                }
            });
        }
    </script>

</div>
