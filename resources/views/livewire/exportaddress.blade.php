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
                                        height="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
                                            <tr>
                                                <td class="frmHeader">CLIENTS</td>
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
                                                    <form name="changeForm" wire:submit.prevent="exportAddress">
                                                        <table width="100%" border="0" cellspacing="1"
                                                            cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="frmRequired">Select
                                                                        clients that you would like addresses
                                                                        exported for</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5" class="frmRequired"><input
                                                                            type="checkbox" class="checkbox"
                                                                            id="select_all_ids"></td>
                                                                    <td class="frmRequired" width="100%">
                                                                        Select/Deselect All
                                                                    </td>
                                                                </tr>
                                                                @foreach ($clientList as $client)
                                                                    <tr>
                                                                        <td width="5" class="frmDescriptionBold">
                                                                            <input type="checkbox"
                                                                                wire:model="clientIds"
                                                                                class="checkbox_ids"
                                                                                value="{{ $client['id'] }}">
                                                                        </td>
                                                                        <td class="frmInput" width="100%">
                                                                            {{ $client['first_name'] }}
                                                                            {{ $client['last_name'] }} </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td class="frmDescriptionBold">
                                                                    </td>
                                                                    <td align="right" class="frmInput">
                                                                        <input type="image"
                                                                            src="{{ asset('assets/images/btnExport.gif') }}"
                                                                            name="EXPORT" value="EXPORT"
                                                                            align="middle" alt="EXPORT">
                                                                        &nbsp;
                                                                        {{-- <input type="image"
                                                                            src="{{ asset('assets/images/btnCancel.gif') }}"
                                                                            name="Cancel" value="Cancel"
                                                                            align="middle" alt="Cancel" wire:click="cancelExport"> --}}
                                                                    </td>
                                                                </tr>
                                                                @if ($errorMessage)
                                                                    <tr align="center">
                                                                        <td colspan="2" class="frmStatus">
                                                                            <div class="alert alert-danger">
                                                                                {{ $errorMessage }}
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif


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


    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td height="25"></td>
            </tr>
        </tbody>
    </table>
    <script src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>
    <script>
        // For all checkbox select/deselect
        $(document).ready(function() {
            $("#select_all_ids").click(function() {
                // Select or deselect all checkboxes based on the state of the 'Select/Deselect All' checkbox
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));

                // Trigger a Livewire update to sync the changes
                @this.set('clientIds', $('.checkbox_ids:checked').map(function() {
                    return $(this).val();
                }).get());

            });

            // Optionally, check if all individual checkboxes are selected and update the "Select/Deselect All" checkbox
            $('.checkbox_ids').click(function() {
                if ($('.checkbox_ids:checked').length == $('.checkbox_ids').length) {
                    $('#select_all_ids').prop('checked', true);
                } else {
                    $('#select_all_ids').prop('checked', false);
                }
            });
        });
    </script>
</div>
