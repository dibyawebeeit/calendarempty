<table width="230" border="0" cellspacing="0" cellpadding="0" height="100%"
    background="{{ asset('assets/images/leftPanelBkgd.jpg') }}">
    <tbody>
        <tr align="left">
            <td height="136" valign="top" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" height="29"
                    background="{{ asset('assets/images/midPanelBkgd.jpg') }}">
                    <tbody>
                        <tr>
                            <td width="49">
                                <div align="center"><img src="{{ asset('assets/images/search.jpg') }}" width="35"
                                        height="5">
                                </div>
                            </td>
                            <td width="91">
                                &nbsp;
                            </td>
                            <td width="30">
                                &nbsp;
                            </td>
                            <td width="67"><img src="{{ asset('assets/images/clear.gif') }}" width="8"
                                    height="29"></td>
                        </tr>
                    </tbody>
                </table>
                <table width="233" border="0" cellspacing="0" cellpadding="0" height="175"
                    background="{{ asset('assets/images/leftPanelBkgd.jpg') }}">
                    <tbody>
                        <tr>
                            <td rowspan="2" width="209" valign="top">
                                <table width="179" border="0" cellspacing="0" cellpadding="0" height="100%">
                                    <tbody>
                                        <tr>
                                            <td height="7"><img src="{{ asset('assets/images/clear.gif') }}"
                                                    width="209" height="7"></td>
                                        </tr>
                                        <tr valign="top">
                                            <td>
                                                <div align="center">
                                                    @if ($parent_class == 'event')
                                                        @if (isset($optional_class) && $optional_class=="calendar_filter")
                                                        <livewire:filtercalendar />
                                                        @else
                                                        <form name="viewByForm">
                                                            <input type="hidden" name="month" value="3">
                                                            <input type="hidden" name="today" value="21">
                                                            <input type="hidden" name="year" value="2025">
                                                            <table width="196" border="0" cellspacing="0"
                                                                cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2"><span
                                                                                class="cp">&nbsp;&nbsp;<b>+ VIEW
                                                                                    EVENTS CALENDAR</b></span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                        @endif
                                                        
                                                        <table width="196" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="15" colspan="2">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="15">&nbsp;</td>
                                                                    <td width="170" valign="top" align="left">
                                                                        <span class="cp"><b>+
                                                                                <a href="{{ route('event.create') }}">
                                                                                    <font color="336699">ADD AN EVENT
                                                                                    </font>
                                                                                </a></b>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                    @if ($parent_class == 'billing')
                                                        <table width="179" border="0" cellspacing="0"
                                                            cellpadding="0" height="100%">
                                                            <tbody>

                                                                <tr valign="top">
                                                                    <td>
                                                                        <table width="196" border="0"
                                                                            cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="15" colspan="2">
                                                                                        &nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="15">
                                                                                        &nbsp;</td>
                                                                                    <td width="170" valign="top"
                                                                                        align="left">
                                                                                        <span class="cp"><b>+
                                                                                                <font color="336699">
                                                                                                    BILLING
                                                                                                </font>
                                                                                            </b>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="15">
                                                                                        &nbsp;</td>
                                                                                    <td width="180" valign="top"
                                                                                        align="left">
                                                                                        <ul>
                                                                                            <span class="cp">
                                                                                                <li>
                                                                                                    <b>
                                                                                                        <a
                                                                                                            href="{{ route('client.index') }}">
                                                                                                            <font
                                                                                                                color="336699">
                                                                                                                ADMIN
                                                                                                                CLIENTS
                                                                                                            </font>
                                                                                                        </a>
                                                                                                    </b>
                                                                                                </li>
                                                                                                <li><b><a
                                                                                                            href="{{ route('billing.index') }}">
                                                                                                            <font
                                                                                                                color="336699">
                                                                                                                TIME/COST/PAYMENT
                                                                                                            </font>
                                                                                                        </a></b>
                                                                                                </li>
                                                                                                <li><b><a
                                                                                                            href="{{ route('invoice.create') }}">
                                                                                                            <font
                                                                                                                color="336699">
                                                                                                                CREATE
                                                                                                                INVOICE
                                                                                                            </font>
                                                                                                        </a></b>
                                                                                                </li>
                                                                                                <li><b><a
                                                                                                            href="{{ route('export_address') }}">
                                                                                                            <font
                                                                                                                color="336699">
                                                                                                                EXPORT
                                                                                                                ADDRESSES
                                                                                                            </font>
                                                                                                        </a></b>
                                                                                                </li>
                                                                                            </span>
                                                                                        </ul>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                    @if ($parent_class == 'account')
                                                        <table width="179" border="0" cellspacing="0"
                                                            cellpadding="0" height="100%">
                                                            <tbody>

                                                                <tr valign="top">
                                                                    <td>
                                                                        <table width="196" border="0"
                                                                            cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="15" colspan="2">
                                                                                        &nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="15">
                                                                                        &nbsp;</td>
                                                                                    <td width="170" valign="top"
                                                                                        align="left">
                                                                                        <span class="cp"><b>+
                                                                                                <font color="336699">
                                                                                                    MY ACCOUNT
                                                                                                </font>
                                                                                            </b>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="15">
                                                                                        &nbsp;</td>
                                                                                    <td width="180" valign="top"
                                                                                        align="left">
                                                                                        <ul>
                                                                                            <span class="cp">
                                                                                                <li>
                                                                                                    <b>
                                                                                                        <a
                                                                                                            href="{{ route('account.edit', Auth::user()->id) }}">
                                                                                                            <font
                                                                                                                color="336699">
                                                                                                                EDIT
                                                                                                                ACCOUNT
                                                                                                                INFO
                                                                                                            </font>
                                                                                                        </a>
                                                                                                    </b>
                                                                                                </li>

                                                                                            </span>
                                                                                        </ul>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @endif

                                                    @if ($parent_class == 'administration')
                                                        <table width="179" border="0" cellspacing="0"
                                                            cellpadding="0" height="100%">
                                                            <tbody>

                                                                <tr valign="top">
                                                                    <td>
                                                                        <table width="196" border="0"
                                                                            cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="15" colspan="2">
                                                                                        &nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="15">
                                                                                        &nbsp;</td>
                                                                                    <td width="170" valign="top"
                                                                                        align="left">
                                                                                        <span class="cp"><b>+
                                                                                                <font color="336699">
                                                                                                    ADMINISTRATION
                                                                                                </font>
                                                                                            </b>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="15">
                                                                                        &nbsp;</td>
                                                                                    <td width="180" valign="top"
                                                                                        align="left">
                                                                                        <ul>
                                                                                            <span class="cp">
                                                                                                <li>
                                                                                                    <b>
                                                                                                        <a
                                                                                                            href="{{ route('user.index') }}">
                                                                                                            <font
                                                                                                                color="336699">
                                                                                                                ADMIN
                                                                                                                USERS
                                                                                                            </font>
                                                                                                        </a>
                                                                                                    </b>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <b>
                                                                                                        <a
                                                                                                            href="{{ route('timecard.index') }}">
                                                                                                            <font
                                                                                                                color="336699">
                                                                                                                ADMIN
                                                                                                                TIMECARDS
                                                                                                            </font>
                                                                                                        </a>
                                                                                                    </b>
                                                                                                </li>

                                                                                            </span>
                                                                                        </ul>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @endif

                                                    <table width="196" border="0" cellspacing="0"
                                                        cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td height="20" colspan="2">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15">&nbsp;</td>
                                                                <td><span class="cp"
                                                                        style="color=#6699CC; font-size:11px"><b>NAVIGATION</b></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15">&nbsp;</td>
                                                                <td width="170" valign="top" align="left">
                                                                    <span class="cp"><b>+ <a
                                                                                href="{{ route('event.index') }}"
                                                                                target="_top">
                                                                                <font color="336699">EVENT CALENDAR
                                                                                </font>
                                                                            </a></b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15">&nbsp;</td>
                                                                <td width="170" valign="top" align="left">
                                                                    <span class="cp"><b>+ <a
                                                                                href="{{ route('billing.index') }}"
                                                                                target="_top">
                                                                                <font color="336699">BILLING
                                                                                </font>
                                                                            </a></b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15">&nbsp;</td>
                                                                <td width="170" valign="top" align="left">
                                                                    <span class="cp"><b>+ <a
                                                                                href="{{ route('account.index') }}">
                                                                                <font color="336699">MY
                                                                                    ACCOUNT</font>
                                                                            </a></b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15">&nbsp;</td>
                                                                <td width="170" valign="top" align="left">
                                                                    <span class="cp"><b>+ <a
                                                                                href="{{ route('administration.index') }}">
                                                                                <font color="336699">
                                                                                    ADMINISTRATION</font>
                                                                            </a></b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15">&nbsp;</td>
                                                                <td width="170" valign="top" align="left">
                                                                    <span class="cp"><b>+ <a
                                                                                href="{{ route('logout') }}"
                                                                                target="_top">
                                                                                <font color="336699">LOGOUT
                                                                                </font>
                                                                            </a></b>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="24" height="54" valign="top"><img
                                    src="{{ asset('assets/images/cornerBig.jpg') }}" width="28"
                                    height="43"><br>
                                <img src="{{ asset('assets/images/blueDot.jpg') }}" width="1" height="13">
                            </td>
                        </tr>
                        <tr>
                            <td width="24" valign="top" background=""> <img
                                    src="{{ asset('assets/images/blueDot.jpg') }}" width="1" height="260">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
