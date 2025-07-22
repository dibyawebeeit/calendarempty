<div>
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
                <tr>
                    <td colspan="2" height="5"><img
                            src="{{ asset('assets/images/clear.gif') }}"
                            height="5"></td>
                </tr>
                <tr>
                    <td width="26">&nbsp;</td>
                    <td width="170" valign="top"
                        align="left">
                        <span class="cp"><b>CALENDAR:</b>
                            <select wire:model="userId" wire:change="userFilter">
                                <option value="0" selected="">
                                    Master
                                </option>
                                @foreach ($userList as $user)
                                <option value="{{$user['id']}}">{{$user['first_name']}} {{$user['last_name']}}</option>
                                @endforeach
                                
                            </select>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="26">&nbsp;</td>
                    <td width="170" valign="top"
                        align="left">
                        <span class="cp"><b>VIEW BY:</b>
                            <select wire:model="viewBy" wire:change="viewFilter">
                                <option value="0" selected="">Month </option>
                                <option value="1"> Month (Printer Friendly) </option>
                                <option value="2"> Week</option>
                            </select>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="26">&nbsp;</td>
                    <td width="170" valign="top"
                        align="left">
                        <span class="cp"><b>CLIENT
                                FILTER:</b>
                            <select wire:model="clientId" wire:change="clientFilter" >
                                <option value="0"
                                    selected="">All Clients
                                </option>
                                @foreach ($clientList as $client)
                                    <option value="{{$client['id']}}">{{$client['first_name']}} {{$client['last_name']}}</option>
                                @endforeach
                            </select>
                        </span>
                    </td>
                </tr>

            </tbody>
        </table>
        <br>
    </form>
    <table cellpadding="2" align="left" cellspacing="0"
        border="5" width="190" bgcolor="#DAEDF8"
        bordercolor="#6699CC">
        <tbody>
            <tr class="ftitle" bgcolor="#6699CC">
                {{-- <td align="center" height="11"><b
                        class="tpl">
                        <font color="#CCFFFF"><a
                                href="eventsByMonth.php?month=2&amp;year=2025"
                                target="contentFrame"
                                onclick="javascript:previous.submit()"><img
                                    src="{{ asset('assets/images/littleArrowLeft.gif') }}"
                                    border="0"></a>
                            &nbsp;March 2025&nbsp;
                            <a href="eventsByMonth.php?month=4&amp;year=2025"
                                target="contentFrame"
                                onclick="javascript:next.submit()"><img
                                    src="{{ asset('assets/images/littleArrowRight.gif') }}"
                                    border="0"></a>
                        </font>
                    </b>
                </td> --}}
                <td align="center" height="11">
                    <b class="tpl">
                        <font color="#CCFFFF">
                            <a href="#" wire:click.prevent="goToPreviousMonth()">
                                <img src="{{ asset('assets/images/littleArrowLeft.gif') }}" border="0">
                            </a>
                            &nbsp;{{ Carbon\Carbon::create($year, $month)->format('F Y') }}&nbsp;
                            <a href="#" wire:click.prevent="goToNextMonth()">
                                <img src="{{ asset('assets/images/littleArrowRight.gif') }}" border="0">
                            </a>
                        </font>
                    </b>
                </td>
            </tr>
            {{-- <tr class="bge">
                <td>
                    <table width="100%" cellpadding="2"
                        cellspacing="0" border="0">
                        <tbody>
                            <tr class="calendarbold">
                                <td align="center">
                                    <font size="-2">S</font>
                                </td>
                                <td align="center">
                                    <font size="-2">M</font>
                                </td>
                                <td align="center">
                                    <font size="-2">T</font>
                                </td>
                                <td align="center">
                                    <font size="-2">W</font>
                                </td>
                                <td align="center">
                                    <font size="-2">T</font>
                                </td>
                                <td align="center">
                                    <font size="-2">F</font>
                                </td>
                                <td align="center">
                                    <font size="-2">S</font>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            1</font>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            2</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            3</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            4</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            5</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            6</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            7</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            8</font>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            9</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            10</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            11</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            12</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            13</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            14</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            15</font>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            16</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            17</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            18</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            19</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            20</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            21</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            22</font>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            23</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            24</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            25</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            26</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            27</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            28</font>
                                    </div>
                                </td>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            29</font>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                        <font size="-2"
                                            color="#003366">
                                            30</font>
                                    </div>
                                </td>
                                <td class="calendarsmal"
                                    bgcolor="AECAEB">
                                    <div align="center">
                                        <font size="-2"><a
                                                href="eventsByDay.php?month=3&amp;today=31&amp;year=2025&amp;noBack=true"
                                                target="contentFrame">31</a>
                                        </font>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="calendarsmal">
                                    <div align="center">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr> --}}
            <tr class="bge">
                <td>
                    <table width="100%" cellpadding="2" cellspacing="0" border="0">
                        <thead>
                            <tr class="calendarbold">
                                <td align="center"><font size="-2">S</font></td>
                                <td align="center"><font size="-2">M</font></td>
                                <td align="center"><font size="-2">T</font></td>
                                <td align="center"><font size="-2">W</font></td>
                                <td align="center"><font size="-2">T</font></td>
                                <td align="center"><font size="-2">F</font></td>
                                <td align="center"><font size="-2">S</font></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($days as $week)
                            <tr>
                                @foreach ($week as $day)
                                    <td class="calendarsmal">
                                        <div align="center">
                                            @if ($day)
                                                @php
                                                    $currentDate = Carbon\Carbon::create($year, $month, $day);
                                                    $formattedDate = $currentDate->toDateString(); // e.g., "2025-04-04"
                                                @endphp
                                                @if (array_key_exists($formattedDate, $highlightedDates))
                                                    <!-- Render the specific highlighted date with an anchor tag -->
                                                    @php
                                                        $eventId = $highlightedDates[$formattedDate]; // Get the event ID
                                                    @endphp
                                                    <font size="-2" color="red">
                                                        <a href="{{ route('event.show', $eventId) }}" target="contentFrame">
                                                            {{ $day }}
                                                        </a>
                                                    </font>
                                                @else
                                                    <font size="-2" color="#003366">{{ $day }}</font>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="ftitle" bgcolor="#6699CC">
                <td align="center" height="11"><b
                        class="tpl" valign="middle">
                        <font color="#CCFFFF">
                        </font>
                        <form wire:submit.prevent="filterMonthYear" border="0">
                            <font color="#CCFFFF">
                                <select wire:model="month"
                                    class="inputstyle">
                                    <option value="1">Jan
                                    </option>
                                    <option value="2">Feb
                                    </option>
                                    <option value="3"
                                        selected="">Mar
                                    </option>
                                    <option value="4">Apr
                                    </option>
                                    <option value="5">May
                                    </option>
                                    <option value="6">Jun
                                    </option>
                                    <option value="7">Jul
                                    </option>
                                    <option value="8">Aug
                                    </option>
                                    <option value="9">Sep
                                    </option>
                                    <option value="10">Oct
                                    </option>
                                    <option value="11">Nov
                                    </option>
                                    <option value="12">Dec
                                    </option>
                                </select>
                                <select wire:model="year"
                                    class="inputstyle">
                                    @foreach(range(2004, 2030) as $yearOption)
                                    <option value="{{ $yearOption }}" {{ $yearOption == $year ? 'selected' : '' }}>
                                        {{ $yearOption }}
                                    </option>
                                @endforeach
                                </select>
                                <input type="Image"
                                    name="Input"
                                    src="{{ asset('assets/images/btnView.gif') }}"
                                    border="0" align="middle">
                                <input type="hidden"
                                    name="today" value="0">
                            </font>
                        </form>
                    </b></td>
            </tr>
        </tbody>
    </table>
</div>
