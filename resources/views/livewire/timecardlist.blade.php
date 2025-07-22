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
                                <td width="100%" class="frmToolHeader">TIMECARD ADMINISTRATION</td>
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
                <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="3"></td>
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
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
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
                                                    <form class="changeForm" name="searchForm"
                                                        wire:submit.prevent="getFilteredTimecardsProperty">
                                                        <table width="100%" border="0" cellspacing="1"
                                                            cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="frmRequired">Search for
                                                                        the
                                                                        user's time entries you would like to modify
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        *User:
                                                                    </td>
                                                                    <td class="frmInput">
                                                                        <select wire:model="searchUserID"
                                                                            class="inputstyle" style="width:306">
                                                                            <option value="">Select</option>
                                                                            @foreach ($userList as $item)
                                                                                <option value="{{ $item['id'] }}">
                                                                                    {{ $item['first_name'] }}
                                                                                    {{ $item['last_name'] }}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        From:
                                                                    </td>
                                                                    <td class="frmInput">
                                                                        {{-- <input type="text" class="textbox"
                                                                            name="searchFromMonth" maxlength="2"
                                                                            value="" style="width:19"> / <input
                                                                            type="text" class="textbox"
                                                                            name="searchFromDay" maxlength="2"
                                                                            value="" style="width:19"> / <input
                                                                            type="text" class="textbox"
                                                                            name="searchFromYear" maxlength="4"
                                                                            value="" style="width:33"> --}}

                                                                        <input type="date" class="textbox"
                                                                            wire:model="fromDate">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">To:
                                                                    </td>
                                                                    <td class="frmInput">
                                                                        {{-- <input type="text" class="textbox"
                                                                            name="searchToMonth" maxlength="2"
                                                                            value="" style="width:19"> / <input
                                                                            type="text" class="textbox"
                                                                            name="searchToDay" maxlength="2"
                                                                            value="" style="width:19"> / <input
                                                                            type="text" class="textbox"
                                                                            name="searchToYear" maxlength="4"
                                                                            value="" style="width:33"> --}}
                                                                        <input type="date" class="textbox"
                                                                            wire:model="toDate">
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
                                <td class="frmBorder"><img src="{{ asset('assets/images/clear.gif') }}"
                                        width="1" height="1"></td>
                            </tr>
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
                                                    @if ($timecardData)
                                                        <form class="changeForm" name="changeForm"
                                                            wire:submit.prevent="updateTimecard">
                                                            <table width="100%" border="0" cellspacing="1"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2" class="frmRequired">
                                                                            *Required
                                                                            Fields</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *User:
                                                                        </td>
                                                                        <td class="frmInput">
                                                                            <select wire:model="userId"
                                                                                class="inputstyle" style="width:306">
                                                                                <option value="">Select</option>
                                                                                @foreach ($userList as $item)
                                                                                    <option
                                                                                        value="{{ $item['id'] }}">
                                                                                        {{ $item['first_name'] }}
                                                                                        {{ $item['last_name'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('userId')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date/Time In:
                                                                            {{-- <span class="frmTxtWhite">(MM/DD/YYYY)</span> --}}
                                                                        </td>
                                                                        <td class="frmInput">
                                                                            {{-- <input type="text" name="timeInMonth"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeInDay" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeInYear" value=""
                                                                        maxlength="4" class="textbox"
                                                                        style="width:33">
                                                                    @ <input type="text" name="timeInHour"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> : <input type="text"
                                                                        name="timeInMinute" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19">
                                                                    <select name="timeInAmPM" class="inputstyle"
                                                                        style="width:50">
                                                                        <option selected="">AM</option>
                                                                        <option>PM</option>
                                                                    </select> --}}
                                                                            <input type="datetime-local"
                                                                                class="textbox" wire:model="timeIn">
                                                                            @error('timeIn')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date/Time Out:
                                                                            {{-- <span class="frmTxtWhite">(MM/DD/YYYY)</span> --}}
                                                                        </td>
                                                                        <td class="frmInput">
                                                                            {{-- <input type="text" name="timeOutMonth"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeOutDay" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeOutYear" value=""
                                                                        maxlength="4" class="textbox"
                                                                        style="width:33">
                                                                    @ <input type="text" name="timeOutHour"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> : <input type="text"
                                                                        name="timeOutMinute" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19">
                                                                    <select name="timeOutAmPM" class="inputstyle"
                                                                        style="width:50">
                                                                        <option selected="">AM</option>
                                                                        <option>PM</option>
                                                                    </select> --}}
                                                                            <input type="datetime-local"
                                                                                class="textbox" wire:model="timeOut">
                                                                            @error('timeOut')
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
                                                                            *Required
                                                                            Fields</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *User:
                                                                        </td>
                                                                        <td class="frmInput">
                                                                            <select wire:model="userId"
                                                                                class="inputstyle" style="width:306">
                                                                                <option value="">Select</option>
                                                                                @foreach ($userList as $item)
                                                                                    <option
                                                                                        value="{{ $item['id'] }}">
                                                                                        {{ $item['first_name'] }}
                                                                                        {{ $item['last_name'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('userId')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date/Time In:
                                                                            {{-- <span class="frmTxtWhite">(MM/DD/YYYY)</span> --}}
                                                                        </td>
                                                                        <td class="frmInput">
                                                                            {{-- <input type="text" name="timeInMonth"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeInDay" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeInYear" value=""
                                                                        maxlength="4" class="textbox"
                                                                        style="width:33">
                                                                    @ <input type="text" name="timeInHour"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> : <input type="text"
                                                                        name="timeInMinute" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19">
                                                                    <select name="timeInAmPM" class="inputstyle"
                                                                        style="width:50">
                                                                        <option selected="">AM</option>
                                                                        <option>PM</option>
                                                                    </select> --}}
                                                                            <input type="datetime-local"
                                                                                class="textbox" wire:model="timeIn">
                                                                            @error('timeIn')
                                                                                <span class="text-red-500">
                                                                                    {{ $message }}
                                                                                </span>
                                                                            @enderror
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="175" class="frmDescriptionBold">
                                                                            *Date/Time Out:
                                                                            {{-- <span class="frmTxtWhite">(MM/DD/YYYY)</span> --}}
                                                                        </td>
                                                                        <td class="frmInput">
                                                                            {{-- <input type="text" name="timeOutMonth"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeOutDay" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19"> / <input type="text"
                                                                        name="timeOutYear" value=""
                                                                        maxlength="4" class="textbox"
                                                                        style="width:33">
                                                                    @ <input type="text" name="timeOutHour"
                                                                        value="" maxlength="2" class="textbox"
                                                                        style="width:19"> : <input type="text"
                                                                        name="timeOutMinute" value=""
                                                                        maxlength="2" class="textbox"
                                                                        style="width:19">
                                                                    <select name="timeOutAmPM" class="inputstyle"
                                                                        style="width:50">
                                                                        <option selected="">AM</option>
                                                                        <option>PM</option>
                                                                    </select> --}}
                                                                            <input type="datetime-local"
                                                                                class="textbox" wire:model="timeOut">
                                                                            @error('timeOut')
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
                </td>
            </tr>
        </tbody>
    </table>
    @if ($searchUserID)
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                    <td class="frmHeader">SEARCH RESULTS</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="2">
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
                                @forelse($this->FilteredTimecards as $timecard)
                                    <tr>
                                        <td class="frmBackground">
                                            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="80" valign="top"
                                                            background="{{ asset('assets/images/gradient_fill.gif') }}">
                                                            <table width="100%" border="0" cellspacing="0"
                                                                cellpadding="3">
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" align="center">
                                                                            <form name="EDITDELETEFORM1"
                                                                                id="EDITDELETEFORM1" method="post"
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
                                                                                <input type="hidden" name="indexid"
                                                                                    value="2">
                                                                                <input type="image"
                                                                                    src="{{ asset('assets/images/btnEdit.gif') }}"
                                                                                    name="Edit" id="Edit"
                                                                                    value="Edit" alt="Edit"
                                                                                    wire:click="editTimecard({{ $timecard->id }})"
                                                                                    onclick="event.preventDefault();">
                                                                                <br>
                                                                                <img src="{{ asset('assets/images/clear.gif') }}"
                                                                                    width="1" height="3"><br>
                                                                                <input type="image"
                                                                                    src="{{ asset('assets/images/btnDelete.gif') }}"
                                                                                    name="Delete" id="Delete"
                                                                                    value="Delete" alt="Delete"
                                                                                    onclick="confirmDeletion({{ $timecard->id }})">


                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td valign="top">
                                                            <table width="100%" border="0" cellspacing="0"
                                                                cellpadding="1">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="frmDescription">
                                                                            <table width="100%" border="0"
                                                                                cellspacing="1" cellpadding="3">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="frmResultsSub">
                                                                                            User:&nbsp;<span
                                                                                                class="frmResultsTxtOutput">{{ $timecard->userDetails ? $timecard->userDetails->first_name . ' ' . $timecard->userDetails->last_name : 'NA' }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="frmResultsMain">
                                                                                            Time In:&nbsp;<span
                                                                                                class="frmResultsTxtOutput">
                                                                                                {{ $timecard->timeIn }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="frmResultsSub">
                                                                                            Time Out:&nbsp;<span
                                                                                                class="frmResultsTxtOutput">{{ $timecard->timeOut }}</span>
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
                    @this.deleteTimecard(userId);
                }
            });
        }
    </script>

</div>
